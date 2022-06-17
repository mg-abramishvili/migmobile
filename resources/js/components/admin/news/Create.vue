<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Добавить новость</h1>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
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
                        <file-pond
                            name="gallery"
                            ref="gallery"
                            label-idle="Загрузить изображение..."
                            v-bind:allow-multiple="false"
                            v-bind:allow-reorder="false"
                            v-bind:allow-image-preview="true"
                            accepted-file-types="image/jpeg, image/png"
                            :server="server"
                        />
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
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
    data() {
        return {
            name: '',
            lang: '',
            text: '',
            gallery: '',

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

            server: {
                remove(filename, load) {
                    load('1');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/_admin/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },
        }
    },
    created() {
        //
    },
    methods: {
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

            if(document.getElementsByName("gallery")[0]) {
                this.gallery = document.getElementsByName("gallery")[0].value
            }

            this.views.saveButton = false

            axios.post(`/_admin/news`, {
                name: this.name,
                text: this.text,
                lang: this.lang,
                gallery: this.gallery,
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
        Loader,
        FilePond,
    }
}
</script>