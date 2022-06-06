<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>О компании</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div class="box px-4 py-4 mb-4">
                    <div class="mb-4">
                        <label>RU</label>
                        <ckeditor :editor="editor" v-model="ru" :config="editorConfig"></ckeditor>
                    </div>
                    <div class="mb-4">
                        <label>UZ</label>
                        <ckeditor :editor="editor" v-model="uz" :config="editorConfig"></ckeditor>
                    </div>
                    <div class="mb-4">
                        <label>TJ</label>
                        <ckeditor :editor="editor" v-model="tj" :config="editorConfig"></ckeditor>
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
            ru: '',
            uz: '',
            tj: '',

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
        this.loadAbout()
    },
    methods: {
        loadAbout() {
            axios.get('/_admin/about')
            .then(response => {
                this.ru = response.data.ru
                this.uz = response.data.uz
                this.tj = response.data.tj

                this.views.loading = false
            })
        },
        save() {
            if(!this.ru || !this.uz || !this.tj) {
                return this.$swal({
                    text: 'Заполните все тексты - для всех языков',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            axios.post('/_admin/about', {
                ru: this.ru,
                uz: this.uz,
                tj: this.tj,
            })
            .then(response => {
                this.views.saveButton = true

                this.$router.push({ name: 'Numbers' })
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