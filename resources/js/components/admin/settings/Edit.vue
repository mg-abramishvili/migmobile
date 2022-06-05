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
                        <input v-model="yookassa_shop_id" type="text" class="form-control">
                    </div>
                    <div class="mb-4">
                        <input v-model="yookassa_secret_key" type="text" class="form-control">
                    </div>
                    <button class="btn btn-primary">Сохранить</button>
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

            views: {
                loading: true,
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

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>