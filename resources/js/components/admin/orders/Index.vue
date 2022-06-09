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
                    <router-link :to="{ name: 'Order', params: { id: order.id } }" v-for="order in orders" :key="order.id" class="card pointer mb-3" style="text-decoration: none; color: #333;">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5 class="card-title mt-0 mb-3">
                                        Заказ №{{ order.id }} от {{ $filters.date(order.created_at) }}
                                    </h5>
    
                                    <p class="card-text mb-1">
                                        <span class="text-muted">Стоимость:</span>
                                        {{ order.price }} руб.

                                        <template v-if="order.is_paid == true">
                                            <span class="text-success fw-bold">оплачен</span>
                                        </template>
                                        <template v-if="order.is_paid == false">
                                            <span class="text-warning fw-bold">не оплачен</span>
                                        </template>
                                    </p>
                                    
                                    <p v-if="order.payment_id" class="card-text mb-1"><small style="font-size: 11px; color: #888;">{{ order.payment_id }}</small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        <span class="text-muted">Заказ:</span>
                                        {{ order.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </router-link>
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