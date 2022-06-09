<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Настройки</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div class="box px-4 py-4 mb-4">
                    <div class="mb-4">
                        <label>Yookassa идентификатор магазина</label>
                        <input v-model="yookassa_shop_id" type="text" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label>Yookassa секретный ключ</label>
                        <input v-model="yookassa_secret_key" type="text" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label>Бесплатная доставка (от)</label>
                        <input v-model="free_delivery_from" type="number" min="100" class="form-control">
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
            yookassa_shop_id: '',
            yookassa_secret_key: '',
            free_delivery_from: 0,

            views: {
                loading: true,
                saveButton: true,
            }
        }
    },
    created() {
        this.loadSettings()
    },
    methods: {
        loadSettings() {
            axios.get('/_admin/settings')
            .then(response => {
                this.yookassa_shop_id = response.data.yookassa_shop_id
                this.yookassa_secret_key = response.data.yookassa_secret_key
                this.free_delivery_from = response.data.free_delivery_from

                this.views.loading = false
            })
        },
        save() {
            if(!this.yookassa_shop_id) {
                return this.$swal({
                    text: 'Укажите yookassa_shop_id',
                    icon: 'error',
                })
            }
            if(!this.yookassa_secret_key) {
                return this.$swal({
                    text: 'Укажите yookassa_secret_key',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            axios.post('/_admin/settings', {
                yookassa_shop_id: this.yookassa_shop_id,
                yookassa_secret_key: this.yookassa_secret_key,
                free_delivery_from: this.free_delivery_from,
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