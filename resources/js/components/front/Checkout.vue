<template>
    <div class="container">
        <h1 v-if="lang == 'uz'" class="title-head mb-4">Буюртма бериш</h1>
        <h1 v-else-if="lang == 'tj'" class="title-head mb-4">Тартиб додани фармоиш</h1>
        <h1 v-else class="title-head mb-4">Оформление заказа</h1>

        <div v-if="cartIsNotEmpty()" class="row">
            <div class="col-12 col-lg-8">
                <div class="complete-order-form">
                    <div v-if="errors.length" class="alert alert-danger" role="alert">
                        <p v-for="error in errors" class="m-0">{{ error }}</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label>Фамилия</label>
                                <input v-model="order.last_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Исм</label>
                                <label v-else-if="lang == 'tj'">Ном</label>
                                <label v-else>Имя</label>
                                <input v-model="order.first_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Шариф</label>
                                <label v-else-if="lang == 'tj'">Номи падар</label>
                                <label v-else>Отчество</label>
                                <input v-model="order.middle_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label>Телефон</label>
                                <div class="d-flex align-items-center">
                                +&nbsp;<input v-model="order.phone" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Почта индекси</label>
                                <label v-else-if="lang == 'tj'">Индекс</label>
                                <label v-else>Индекс</label>
                                <input v-model="order.zip" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Вилоят</label>
                                <label v-else-if="lang == 'tj'">Минтақа</label>
                                <label v-else>Регион</label>
                                <input v-model="order.region" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Шаҳар</label>
                                <label v-else-if="lang == 'tj'">Шаҳр</label>
                                <label v-else>Город</label>
                                <input v-model="order.city" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Кўча</label>
                                <label v-else-if="lang == 'tj'">Куча</label>
                                <label v-else>Улица</label>
                                <input v-model="order.street" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Уй</label>
                                <label v-else-if="lang == 'tj'">Бино</label>
                                <label v-else>Дом</label>
                                <input v-model="order.building" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Подъезд</label>
                                <label v-else-if="lang == 'tj'">Даромад</label>
                                <label v-else>Подъезд</label>
                                <input v-model="order.entrance" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label v-if="lang == 'uz'">Квартира</label>
                                <label v-else-if="lang == 'tj'">Хона</label>
                                <label v-else>Квартира</label>
                                <input v-model="order.apartment" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <label>&nbsp;</label>
                <div class="your-order mb-4">
                    <p v-if="lang == 'uz'"><strong>Буюртмангиз:</strong></p>
                    <p v-else-if="lang == 'tj'"><strong>Фармоиши Шумо:</strong></p>
                    <p v-else><strong>Ваш заказ:</strong></p>
                    
                    <ul v-if="cart.simple">
                        <template v-for="plan in cart.simple.plans">
                            <li v-if="plan.quantity > 0">
                                <template v-if="lang == 'uz'">{{ plan.quantity }} &times; {{ plan.name_uz }}</template>
                                <template v-else-if="lang == 'tj'">{{ plan.quantity }} &times; {{ plan.name_tj }}</template>
                                <template v-else>{{ plan.quantity }} &times; {{ plan.name_ru }}</template>

                                <a href="/order/" class="btn btn-sm btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>
                                </a>
                            </li>
                        </template>
                    </ul>

                    <ul v-if="cart.pretty">
                        <li v-for="number in cart.pretty.numbers">
                            <template v-if="lang == 'uz'">{{ number }} (чиройли рақам)</template>
                            <template v-else-if="lang == 'tj'">{{ number }} (Рақами зебо)</template>
                            <template v-else>{{ number }} (красивый номер)</template>

                            <a href="/order-pretty/" class="btn btn-sm btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="your-order-bottom mb-4">
                    <div v-if="lang == 'uz'" class="price mb-4">Жами: {{ price }} руб.</div>
                    <div v-else-if="lang == 'tj'" class="price mb-4">Ҳамагӣ: {{ price }} руб.</div>
                    <div v-else class="price mb-4">Итого: {{ price }} руб.</div>

                    <button @click="saveOrder()" :disabled="!views.saveButton" class="btn btn-primary">
                        <template v-if="lang == 'uz'">Тўлаш учун</template>
                        <template v-else-if="lang == 'tj'">Пардохт</template>
                        <template v-else>Перейти к оплате</template>
                    </button>
                </div>
            </div>
        </div>
        <div v-else>Ваш заказ пуст.</div>
    </div>
</template>

<script>
export default {
    props: ['lang'],
    data() {
        return {
            order: {
                first_name: '',
                middle_name: '',
                last_name: '',
                phone: '',
                zip: '',
                region: '',
                city: '',
                street: '',
                building: '',
                entrance: '',
                apartment: '',
            },

            cart: {},

            errors: [],

            views: {
                saveButton: true,
            }
        }
    },
    computed: {
        price() {
            let simplePrice = 0
            let prettyPrice = 0

            if(this.cart.simple && this.cart.simple.price) {
                simplePrice = this.cart.simple.price
            }
            if(this.cart.pretty && this.cart.pretty.price) {
                prettyPrice = this.cart.pretty.price
            }

            return simplePrice + prettyPrice
        }
    },
    watch: {
        order: {
            deep: true,
            handler() {
                this.order.phone = this.order.phone.replace(/[^\d]+/g, "")
            }
        },
    },
    created() {
        this.loadSimpleCart()
        this.loadPrettyCart()
    },
    methods: {
        loadSimpleCart() {
            axios.get('/_cart', { params: { type: 'simple' } })
            .then(response => {
                if(response.data) {
                    this.cart.simple = response.data
                }
            })
        },
        loadPrettyCart() {
            axios.get('/_cart', { params: { type: 'pretty' } })
            .then(response => {
                if(response.data) {
                    this.cart.pretty = response.data
                }
            })
        },
        cartIsNotEmpty() {
            let plansTotalQuantity = 0
            let numbersTotalQuantity = 0

            if(this.cart.simple && this.cart.simple.plans && this.cart.simple.plans.length) {
                plansTotalQuantity = this.cart.simple.plans.reduce((accumulator, object) => {
                    return accumulator + object.quantity
                }, 0)
            }

            if(this.cart.pretty && this.cart.pretty.numbers && this.cart.pretty.numbers.length) {
                numbersTotalQuantity = this.cart.pretty.numbers.length
            }

            if(plansTotalQuantity > 0 || numbersTotalQuantity > 0) {
                return true
            } else {
                return false
            }
        },
        // removeFromSimpleCart(plan) {
        //     this.cart.simple.plans.find(p => p.name === plan.name).quantity = 0
        //     this.saveCart()
        // },
        // removeFromPrerttyCart(number) {
        //     let index = this.cart.pretty.numbers.indexOf(number)
        //     if (index > -1) {
        //         this.cart.pretty.numbers.splice(index, 1)
        //     }
        //     this.saveCart()
        // },
        // saveCart() {
        //     axios.post('/_simple-cart', {
        //         simple_cart: this.cart.simple
        //     })

        //     axios.post('/_pretty-cart', {
        //         pretty_cart: this.cart.pretty
        //     })
        // },
        saveOrder() {
            this.errors = []

            if(!this.order.first_name) {
                this.errors.push('Укажите имя')
            }
            if(!this.order.last_name) {
                this.errors.push('Укажите фамилию')
            }
            if(!this.order.middle_name) {
                this.errors.push('Укажите отчество')
            }
            if(!this.order.phone) {
                this.errors.push('Укажите телефон')
            }
            if(!this.order.zip) {
                this.errors.push('Укажите индекс')
            }
            if(!this.order.region) {
                this.errors.push('Укажите регион')
            }
            if(!this.order.city) {
                this.errors.push('Укажите город')
            }
            if(!this.order.street) {
                this.errors.push('Укажите улицу')
            }
            if(!this.order.building) {
                this.errors.push('Укажите дом')
            }
            if(!this.order.entrance) {
                this.errors.push('Укажите подъезд')
            }
            if(!this.order.apartment) {
                this.errors.push('Укажите квартиру')
            }
            if(this.errors.length) {
                document.body.scrollTop = 0
                document.documentElement.scrollTop = 0
                return
            }

            this.views.saveButton = false

            axios.post('/_order', {
                order: this.order,
                cart: this.cart,
            })
            .then(response => {
                window.location.href = response.data
            })
            .catch(errors => {
                this.errors.push(errors.response.data)

                this.views.saveButton = true
            })
        },
    }
}
</script>