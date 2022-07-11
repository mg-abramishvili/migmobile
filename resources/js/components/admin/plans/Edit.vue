<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>{{ plan.name_ru }}</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div class="box px-4 py-4 mb-4">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <label>Название (код)</label>
                                <input v-model="name" type="text" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label>Название (рус)</label>
                                <input v-model="name_ru" type="text" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label>Название (узб)</label>
                                <input v-model="name_uz" type="text" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label>Название (тадж)</label>
                                <input v-model="name_tj" type="text" class="form-control mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Минуты</label>
                                <input v-model="min" type="number" min="0" class="form-control mb-3">
                            </div>
                            <div class="col">
                                <label>ГБ</label>
                                <input v-model="gb" type="number" min="0" class="form-control mb-3">
                            </div>
                            <div class="col">
                                <label>SMS</label>
                                <input v-model="sms" type="number" min="0" class="form-control mb-3">
                            </div>
                            <div class="col">
                                <label>Доступно к заказу</label>
                                <input v-model="in_stock" type="number" min="0" class="form-control mb-3">
                            </div>
                            <div class="col">
                                <label>Абонентская плата</label>
                                <input v-model="price" type="number" min="0" class="form-control mb-3">
                            </div>
                        </div>
                    </div>
                    <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary">Сохранить</button>
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
            plan: '',

            name: '',
            name_ru: '',
            name_uz: '',
            name_tj: '',
            min: '',
            gb: '',
            sms: '',
            price: '',
            in_stock: '',

            views: {
                loading: true,
                saveButton: true,
            },
        }
    },
    created() {
        this.loadPlan()
    },
    methods: {
        loadPlan() {
            axios.get(`/_admin/plan/${this.$route.params.id}`)
            .then(response => {
                this.plan = response.data

                this.name = response.data.name
                this.name_ru = response.data.name_ru
                this.name_uz = response.data.name_uz
                this.name_tj = response.data.name_tj
                this.min = response.data.min
                this.gb = response.data.gb
                this.sms = response.data.sms
                this.price = response.data.price
                this.in_stock = response.data.in_stock

                this.views.loading = false
            })
        },
        save() {
            if(!this.name) {
                return this.$swal({
                    text: 'Заполните название',
                    icon: 'error',
                })
            }
            if(!this.name_ru) {
                return this.$swal({
                    text: 'Заполните название на русском',
                    icon: 'error',
                })
            }
            if(!this.name_uz) {
                return this.$swal({
                    text: 'Заполните название на узбекском',
                    icon: 'error',
                })
            }
            if(!this.name_tj) {
                return this.$swal({
                    text: 'Заполните название на таджикском',
                    icon: 'error',
                })
            }
            if(!this.min) {
                return this.$swal({
                    text: 'Заполните кол-во минут',
                    icon: 'error',
                })
            }
            if(!this.gb) {
                return this.$swal({
                    text: 'Заполните кол-во ГБ',
                    icon: 'error',
                })
            }
            if(!this.sms) {
                return this.$swal({
                    text: 'Заполните кол-во SMS',
                    icon: 'error',
                })
            }
            if(!this.price) {
                return this.$swal({
                    text: 'Укажите цену',
                    icon: 'error',
                })
            }
            if(!this.in_stock) {
                return this.$swal({
                    text: 'Укажите кол-во',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            axios.put(`/_admin/plan/${this.$route.params.id}/update`, {
                name: this.name,
                name_ru: this.name_ru,
                name_uz: this.name_uz,
                name_tj: this.name_tj,
                min: this.min,
                gb: this.gb,
                sms: this.sms,
                price: this.price,
                in_stock: this.in_stock,
            })
            .then(response => {
                this.views.saveButton = true

                this.$router.push({ name: 'Plans' })
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