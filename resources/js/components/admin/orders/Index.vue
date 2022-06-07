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
                <div v-if="orders.length" class="mb-4">
                    <div v-for="order in orders" :key="order.id" class="card mb-3">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5 class="card-title mt-0 mb-3">
                                        Заказ №{{ order.id }} от {{ $filters.date(order.created_at) }}
                                    </h5>
                                    
                                    <p class="card-text mb-1">
                                        <span class="text-muted">Клиент:</span>
                                        {{ order.name }}, {{ order.phone }}
                                    </p>
    
                                    <p class="card-text mb-1">
                                        <span class="text-muted">Стоимость:</span>
                                        {{ order.price }} руб.

                                        <template v-if="order.is_paid == true">
                                            <span class="text-success">оплачен</span>
                                        </template>
                                        <template v-if="order.is_paid == false">
                                            <span class="text-danger">не оплачен</span>
                                        </template>
                                    </p>
                                    
                                    <p v-if="order.payment_id" class="card-text mb-0"><small style="font-size: 11px; color: #888;">{{ order.payment_id }}</small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    {{ order.description }}
                                </div>
                            </div>
                        </div>
                    </div>
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