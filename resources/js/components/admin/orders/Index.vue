<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <h1>Заказы</h1>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="d-flex">
                        <select v-model="selected.status" class="form-select">
                            <option value="all">Все статусы</option>
                            <option value="created">Принят в работу</option>
                            <option value="sent">Отправлен</option>
                            <option value="delivered">Доставлен</option>
                        </select>
                        <button @click="filter()" class="btn btn-primary ms-1">Показать</button>
                    </div>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="ordersFiltered.length" class="mb-4">
                    <router-link :to="{ name: 'Order', params: { id: order.id } }" v-for="order in ordersFiltered" :key="order.id" class="card pointer mb-3" style="text-decoration: none; color: #333;">
                        <div class="row g-0">
                            <div class="col-lg-2">
                                <div v-if="order.status == 'created'" class="bg-warning h-100">
                                    <div class="card-body h-100 d-flex align-items-center justify-content-center">Принят в работу</div>
                                </div>
                                <div v-if="order.status == 'sent'" class="bg-info h-100">
                                    <div class="card-body h-100 d-flex align-items-center justify-content-center">Отправлен</div>
                                </div>
                                <div v-if="order.status == 'delivered'" class="bg-success text-white h-100">
                                    <div class="card-body h-100 d-flex align-items-center justify-content-center">Доставлен</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                                            <span class="text-danger fw-bold">не оплачен</span>
                                        </template>
                                    </p>
                                    
                                    <p v-if="order.payment_id" class="card-text mb-1"><small style="font-size: 11px; color: #888;">{{ order.payment_id }}</small></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        <span class="text-muted">Заказ:</span>
                                        <template v-if="order.description.simple">
                                            <ul>
                                                <template v-for="plan in order.description.simple.plans">
                                                    <li v-if="plan.quantity > 0">{{ plan.quantity }} &times; {{ plan.name_ru }}</li>
                                                </template>
                                            </ul>
                                        </template>
                                        <template v-if="order.description.pretty">
                                            <ul>
                                                <li v-for="number in order.description.pretty.numbers">
                                                    {{ number }} (красивый номер)
                                                </li>
                                            </ul>
                                        </template>
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
            ordersFiltered: [],

            selected: {
                status: 'all',
            },

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
                this.ordersFiltered = response.data

                this.views.loading = false
            })
        },
        filter() {
            if(this.selected.status == 'all') {
                return this.ordersFiltered = this.orders
            }
            if(this.selected.status == 'created') {
                return this.ordersFiltered = this.orders.filter(order => order.status == 'created')
            }
            if(this.selected.status == 'sent') {
                return this.ordersFiltered = this.orders.filter(order => order.status == 'sent')
            }
            if(this.selected.status == 'delivered') {
                return this.ordersFiltered = this.orders.filter(order => order.status == 'delivered')
            }
        },
    },
    components: {
        Loader
    }
}
</script>