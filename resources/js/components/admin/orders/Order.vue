<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Заказ №{{ order.id }}</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div class="box px-4 py-4 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <p class="my-2">
                                <strong>Фамилия:</strong>
                                {{ last_name }}
                            </p>

                            <p class="my-2">
                                <strong>Имя:</strong>
                                {{ first_name }}
                            </p>

                            <p class="my-2">
                                <strong>Отчество:</strong>
                                {{ middle_name }}
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="my-2">
                                <strong>Телефон:</strong>
                                {{ phone }}
                            </p>

                            <p class="my-2">
                                <strong>Статус: </strong>
                                <template v-if="is_paid == true">
                                    <span class="text-success fw-bold">оплачен</span>
                                </template>
                                <template v-if="is_paid == false">
                                    <span class="text-warning fw-bold">не оплачен</span>
                                </template>
                            </p>

                            <p class="my-2">
                                <strong>ID оплаты:</strong>
                                {{ payment_id }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box px-4 py-4 mb-4">
                    <p class="mb-0 my-2">
                        <strong>Заказ:</strong>
                        {{ description }}
                    </p>
                </div>

                <div class="box px-4 py-4 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="my-2">
                                <label>Доставка (компания)</label>
                                <input v-model="delivery_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="my-2">
                                <label>Трек-номер</label>
                                <input v-model="delivery_track_number" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="my-2">
                                <label>&nbsp;</label>
                                <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary w-100">OK</button>
                            </div>
                        </div>
                    </div>
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
            order: '',

            description: '',
            first_name: '',
            middle_name: '',
            last_name: '',
            zip: '',
            city: '',
            region: '',
            phone: '',
            street: '',
            apartment: '',
            building: '',
            entrance: '',
            is_paid: '',
            payment_id: '',

            delivery_name: '',
            delivery_track_number: '',

            views: {
                loading: true,
                saveButton: true,
            },
        }
    },
    created() {
        this.loadOrder()
    },
    methods: {
        loadOrder() {
            axios.get(`/_admin/order/${this.$route.params.id}`)
            .then(response => {
                this.order = response.data

                this.first_name = response.data.first_name
                this.middle_name = response.data.middle_name
                this.last_name = response.data.last_name
                this.description = response.data.description
                this.phone = response.data.phone
                this.zip = response.data.zip
                this.city = response.data.city
                this.region = response.data.region
                this.phone = response.data.phone
                this.street = response.data.street
                this.apartment = response.data.apartment
                this.building = response.data.building
                this.entrance = response.data.entrance
                this.is_paid = response.data.is_paid
                this.payment_id = response.data.payment_id

                this.delivery_name = response.data.delivery_name
                this.delivery_track_number = response.data.delivery_track_number

                this.views.loading = false
            })
        },
        save() {
            this.views.saveButton = false

            axios.put(`/_admin/order/${this.$route.params.id}/update`, {
                delivery_name: this.delivery_name,
                delivery_track_number: this.delivery_track_number,
            })
            .then(response => {
                this.views.saveButton = true

                this.$router.push({ name: 'Orders' })
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