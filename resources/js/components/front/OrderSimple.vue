<template>
    <div class="container">
        <h1 class="title-head mb-4">Купить SIM-карту</h1>

        <div class="order-numbers">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div v-for="plan in plans" class="card card-plan mb-3">
                        <div class="card-plan-icon">
                            <img :src="plan.icon" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="card-plan-title">
                            <h5 class="card-title m-0">{{ plan.name_ru }}</h5>
                        </div>
                        <div class="card-plan-buy">
                            <input v-model="order.plans.find(p => p.name == plan.name).quantity" @change="saveCart()" type="number" min="0" class="form-control">
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div v-if="order.plans" class="order-page-cart">
                        <p class="fw-bold">Ваш заказ:</p>
                        <ul>
                            <template v-for="orderItem in order.plans">
                                <li v-if="orderItem.quantity > 0">
                                    {{  orderItem.quantity }} &times; {{  orderItem.name_ru }}
                                    <button @click="removeFromCart(orderItem)" class="btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </li>
                            </template>
                        </ul>
                        <p v-if="priceWithQuantity > 0" class="price">{{ priceWithQuantity }} руб.</p>
                        <a v-if="priceWithQuantity > 0" href="/checkout" class="btn btn-primary btn-white">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lang'],
    data() {
        return {
            plans: [],
            prices: [],

            order: {
                plans: [],
                name: '',
                phone: '',
                id: '',
            },

            errors: [],
        }
    },
    computed: {
        quantity() {
            if(!this.order.plans.length) {
                return 0
            }

            return this.order.plans.reduce((a,curr) => a + curr.quantity, 0)
        },
        price() {
            if(!this.quantity) {
                return 0
            }

            let quantity = this.quantity
            let conditions = this.prices.filter(price => price.type == 'simple')
            let price = 0

            conditions.forEach((condition) => {
                if(eval(condition.quantity_condition)) {
                    price = condition.price
                }
            })

            return price
        },
        priceWithQuantity() {
            return this.price * this.quantity
        },
    },
    created() {
        this.loadPlans()
        this.loadPrices()
        this.loadCart()
    },
    methods: {
        loadPlans() {
            axios.get('/_plans')
            .then(response => {
                this.plans = response.data

                response.data.forEach(plan => {
                    this.order.plans.push({ "name": plan.name, "name_ru": plan.name_ru, "quantity": 0 })
                })
            })
        },
        loadPrices() {
            axios.get('/_prices')
            .then(response => {
                this.prices = response.data
            })
        },
        loadCart() {
            axios.get('/_cart', { params: { type: 'simple' } })
            .then(response => {
                if(response.data) {
                    this.order.plans = response.data
                }
            })
        },
        removeFromCart(item) {
            item.quantity = 0
            
            this.saveCart()
        },
        saveCart() {
            axios.post('/_simple-cart', {
                plans: this.order.plans
            })
        },
    },
}
</script>