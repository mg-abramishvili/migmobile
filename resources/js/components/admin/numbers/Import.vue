<template>         
    <div class="subheader w-100">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h1>
                    <router-link :to="{ name: 'Numbers' }">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </router-link>
                    Импорт XLSX
                </h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box px-4 py-4 mb-4">
                <div class="box-tab-content">
                    <p class="mb-3"><strong class="text-danger">Файл XLSX должен содержать две колонки - серийный номер и номер. Строго в этой последовательности. Также в файле должен быть только 1 лист (страница) и не должно быть заголовков (названия столбцов)!</strong></p>

                    <div class="mb-3">
                        <label class="form-label">Укажите тариф</label>
                        <select v-model="plan_id" class="form-select">
                            <option v-for="plan in plans" :value="plan.id">{{ plan.name_ru }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Загрузите файл</label>
                        <input @change="uploadFile" ref="file" class="form-control" type="file" id="formFile">
                    </div>
                            
                    <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary mt-3">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            plans: [],

            file: null,
            plan_id: null,

            views: {
                loading: true,
                saveButton: true,
            }
        }
    },
    created() {
        this.loadPlans()
    },
    methods: {
        loadPlans() {
            axios.get('/_admin/plans')
            .then(response => {
                this.plans = response.data

                this.views.loading = false
            })
        },
        uploadFile() {
            this.file = this.$refs.file.files[0]
        },
        save() {
            this.views.saveButton = false

            const formData = new FormData()
            formData.append('file', this.file)
            formData.append('plan_id', this.plan_id)
            const headers = { 'Content-Type': 'multipart/form-data' };
            
            axios.post('/_admin/numbers-import', formData, { headers })
            .then((res) => {
                // res.data.files
                // res.status
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