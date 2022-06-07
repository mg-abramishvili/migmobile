<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Заказы</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="orders.length" class="box mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Дата</th>
                                <th>Клиент</th>
                                <th>Заказ</th>
                                <th>Стоимость</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders" :key="order.id">
                                <td>{{ order.id }}</td>
                                <td class="w-25">{{ $filters.date(order.created_at) }}</td>
                                <td>{{ order.name }} <br>{{ order.phone }}</td>
                                <td>{{ order.description }}</td>
                                <td>{{ order.price }}</td>
                                <td>
                                    <template v-if="order.is_paid == true">
                                        <span class="text-success">оплачен</span>
                                        <span v-if="order.payment_id" class="d-block text-muted" style="font-size: 11px;">{{ order.payment_id }}</span>
                                    </template>
                                    <template v-if="order.is_paid == false">
                                        <span class="text-danger">не оплачен</span>
                                    </template>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else>Заказов нет.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            orders: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadOrders()
    },
    methods: {
        loadOrders() {
            axios.get('/_admin/orders')
            .then(response => {
                this.orders = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>