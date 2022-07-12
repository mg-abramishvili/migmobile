<template>
    <div class="container">
        <h1 v-if="lang == 'uz'" class="title-head mb-4">SIM-карта сотиб олиш</h1>
        <h1 v-else-if="lang == 'tj'" class="title-head mb-4">Хариди SIM-корт</h1>
        <h1 v-else class="title-head mb-4">Купить SIM-карту</h1>

        <div class="order-numbers">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <template v-for="plan in plans">
                        <div v-if="plan.in_stock > 0" class="card card-plan mb-3">
                            <div class="card-plan-icon">
                                <img :src="plan.icon" class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="card-plan-title">
                                <h5 v-if="lang == 'uz'" class="card-title m-0">{{ plan.name_uz }}</h5>
                                <h5 v-else-if="lang == 'tj'" class="card-title m-0">{{ plan.name_tj }}</h5>
                                <h5 v-else class="card-title m-0">{{ plan.name_ru }}</h5>
                            </div>
                            <div class="card-plan-buy">
                                <input v-model="selected.plans.find(p => p.name == plan.name).quantity" @change="saveCart()" type="number" min="0" :max="plan.in_stock" class="form-control">
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="col-12 col-lg-4">
                    <div v-if="prices" class="disclaimer mb-4">
                        <p v-if="prices.filter(price => price.type == 'simple')[0]">
                            <template v-if="lang == 'uz'">1 рақам учун нарх = <strong>{{ prices.filter(price => price.type == 'simple')[0].price }} руб</strong>.</template>
                            <template v-else-if="lang == 'tj'">Нарх барои 1 рақам = <strong>{{ prices.filter(price => price.type == 'simple')[0].price }} руб</strong>.</template>
                            <template v-else>Цена за 1 номер = <strong>{{ prices.filter(price => price.type == 'simple')[0].price }} руб</strong>.</template>
                        </p>

                        <p v-if="prices.filter(price => price.type == 'simple')[1]">
                            <template v-if="lang == 'uz'">5 ёки ундан кўп рақам сотиб олинаётганда, 1 рақам учун нарх = <strong>{{ prices.filter(price => price.type == 'simple')[1].price }} руб</strong>.</template>
                            <template v-else-if="lang == 'tj'">Ҳангоми харидани 5 рақам ва бештар аз он, нархи 1 рақам = <strong>{{ prices.filter(price => price.type == 'simple')[1].price }} руб</strong>.</template>
                            <template v-else>При покупке 5 номеров и более, цена за 1 номер = <strong>{{ prices.filter(price => price.type == 'simple')[1].price }} руб</strong>.</template>
                        </p>

                        <p v-if="prices.filter(price => price.type == 'simple')[2]">
                            <template v-if="lang == 'uz'">10 ёки ундан кўп рақам сотиб олинаётганда, 1 рақам учун нарх = <strong>{{ prices.filter(price => price.type == 'simple')[2].price }} руб</strong>.</template>
                            <template v-else-if="lang == 'tj'">Ҳангоми харидани 10 ва зиёда рақам, нархи 1 рақам = <strong>{{ prices.filter(price => price.type == 'simple')[2].price }} руб</strong>.</template>
                            <template v-else>При покупке 10 и более номеров, цена за 1 номер = <strong>{{ prices.filter(price => price.type == 'simple')[2].price }} руб</strong>.</template>
                        </p>
                    </div>
                    <div v-if="priceWithQuantity > 0" class="order-page-cart">
                        <p v-if="lang == 'uz'" class="fw-bold">Буюртмангиз:</p>
                        <p v-else-if="lang == 'tj'" class="fw-bold">Фармоиши Шумо:</p>
                        <p v-else class="fw-bold">Ваш заказ:</p>
                        
                        <ul>
                            <template v-for="orderItem in selected.plans">
                                <li v-if="orderItem.quantity > 0">
                                    <template v-if="lang == 'uz'">{{  orderItem.quantity }} &times; {{  orderItem.name_uz }}</template>
                                    <template v-else-if="lang == 'tj'">{{  orderItem.quantity }} &times; {{  orderItem.name_tj }}</template>
                                    <template v-else>{{  orderItem.quantity }} &times; {{  orderItem.name_ru }}</template>

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
                        <p>{{ deliveryName }}</p>
                        <a v-if="priceWithQuantity > 0" @click="proceedToCheckout()" class="btn btn-primary btn-white">
                            <template v-if="lang == 'uz'">Буюртма бериш</template>
                            <template v-else-if="lang == 'tj'">Кассири</template>
                            <template v-else>Оформить заказ</template>
                        </a>
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
            settings: {},

            selected: {
                plans: [],
            },
        }
    },
    computed: {
        quantity() {
            if(!this.selected.plans.length) {
                return 0
            }

            return this.selected.plans.reduce((a,curr) => a + curr.quantity, 0)
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
        deliveryName() {
            if(this.priceWithQuantity >= this.settings.free_delivery_from) {
                if(this.lang == 'uz') {
                    return 'Бепул курер етказиб бериш'
                }
                if(this.lang == 'tj') {
                    return 'Курьерская расонидани'
                }

                return 'Бесплатная курьерская доставка до двери'
            }
            if(this.priceWithQuantity < this.settings.free_delivery_from) {
                if(this.lang == 'uz') {
                    return 'Россия почтасига бепул етказиб бериш'
                }
                if(this.lang == 'tj') {
                    return 'Бепул ьамлу дар шӯъбаи Почтаи Россия'
                }

                return 'Бесплатная доставка в отделение Почты России'
            }
        }
    },
    created() {
        this.loadPlans()
        this.loadPrices()
        this.loadCart()
        this.loadSettings()
    },
    methods: {
        loadPlans() {
            axios.get('/_plans')
            .then(response => {
                this.plans = response.data

                response.data.forEach(plan => {
                    if(this.lang == 'uz') {
                        return this.selected.plans.push({ "name": plan.name, "name_uz": plan.name_uz, "quantity": 0 })
                    }

                    if(this.lang == 'tj') {
                        return this.selected.plans.push({ "name": plan.name, "name_tj": plan.name_tj, "quantity": 0 })
                    }

                    this.selected.plans.push({ "name": plan.name, "name_ru": plan.name_ru, "quantity": 0 })
                })
            })
        },
        loadPrices() {
            axios.get('/_prices')
            .then(response => {
                this.prices = response.data
            })
        },
        loadSettings() {
            axios.get('/_settings')
            .then(response => {
                this.settings = response.data.data
            })
        },
        loadCart() {
            axios.get('/_cart', { params: { type: 'simple' } })
            .then(response => {
                if(response.data) {
                    this.selected.plans = response.data.plans
                }
            })
        },
        removeFromCart(item) {
            item.quantity = 0
            
            this.saveCart()
        },
        saveCart() {
            axios.post('/_simple-cart', {
                simple_cart: { "plans": this.selected.plans, "price": this.priceWithQuantity }
            })
        },
        proceedToCheckout() {
            this.saveCart()
            
            window.location.href = '/checkout'
        }
    },
}
</script>