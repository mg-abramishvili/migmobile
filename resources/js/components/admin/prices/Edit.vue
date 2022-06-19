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
                                <td>{{ priceItem.name }}</td>
                                <td>{{ priceItem.price }}</td>
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
    },
    components: {
        Loader
    }
}
</script>