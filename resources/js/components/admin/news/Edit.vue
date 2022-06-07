<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>{{ newsItem.name }}</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div class="box px-4 py-4 mb-4">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <label>Заголовок</label>
                                <input v-model="name" type="text" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label>Язык</label>
                                <select v-model="lang" class="form-select">
                                    <option value="ru">русский</option>
                                    <option value="uz">узбекский</option>
                                    <option value="tj">таджикский</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label>Текст</label>
                        <ckeditor :editor="editor" v-model="text" :config="editorConfig"></ckeditor>
                    </div>
                    <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
    data() {
        return {
            newsItem: '',

            name: '',
            lang: '',
            text: '',

            views: {
                loading: true,
                saveButton: true,
            },

            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                toolbar: [ 'heading', 'bold', '|', 'bulletedList', 'numberedList', '|', 'insertTable', '|', 'undo', 'redo' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Тег P' },
                    ]
                },
            },
        }
    },
    created() {
        this.loadNewsItem()
    },
    methods: {
        loadNewsItem() {
            axios.get(`/_admin/news-item/${this.$route.params.id}`)
            .then(response => {
                this.newsItem = response.data

                this.name = response.data.name
                this.text = response.data.text
                this.lang = response.data.lang

                this.views.loading = false
            })
        },
        save() {
            if(!this.name) {
                return this.$swal({
                    text: 'Заполните заголовок',
                    icon: 'error',
                })
            }
            if(!this.lang) {
                return this.$swal({
                    text: 'Укажите язык',
                    icon: 'error',
                })
            }
            if(!this.text) {
                return this.$swal({
                    text: 'Заполните текст новости',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            axios.put(`/_admin/news-item/${this.$route.params.id}/update`, {
                name: this.name,
                text: this.text,
                lang: this.lang
            })
            .then(response => {
                this.views.saveButton = true

                this.$router.push({ name: 'News' })
            })
            .catch(errors => {
                this.views.saveButton = true
                
                return this.$swal({
                    text: 'Ошибка',
                    icon: 'error',
                })
            })
        },
    },
    components: {
        Loader
    }
}
</script>