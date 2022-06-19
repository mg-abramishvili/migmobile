<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Цены</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />
        
        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="views.success" class="alert alert-success" role="alert">
                    Цены успешно обновлены!
                </div>

                <div v-if="prices.length" class="box mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="priceItem in prices" :key="priceItem.id">
                                <td>
                                    <template v-if="priceItem.type == 'simple'">(Тарифы)</template>
                                    <template v-if="priceItem.type == 'pretty'">(Красивые номера)</template>
                                    
                                    {{ priceItem.name }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <input v-model="priceItem.price" type="number" min="0" class="form-control">
                                        <button @click="save(priceItem.id)" class="btn btn-sm btn-primary">Сохранить</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else>Цен нет.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            prices: [],

            views: {
                loading: true,
                success: false,
            }
        }
    },
    created() {
        this.loadPrices()
    },
    methods: {
        loadPrices() {
            axios.get('/_admin/prices')
            .then(response => {
                this.prices = response.data

                this.views.loading = false
            })
        },
        save(id) {
            axios.put(`/_admin/price/${id}/update`, {
                price: this.prices.find(p => p.id === id).price
            })
            .then(response => {
                this.loadPrices()

                this.views.success = true

                setTimeout(() => {
                    this.views.success = false
                }, 1500)
            })
        }
    },
    components: {
        Loader
    }
}
</script>