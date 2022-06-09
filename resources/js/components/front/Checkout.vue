<template>
    <div class="container">
        <h1 class="title-head mb-4">Оформление заказа</h1>

        <div v-if="cart.simple || cart.pretty" class="row">
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
                                <label>Имя</label>
                                <input v-model="order.first_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label>Отчество</label>
                                <input v-model="order.middle_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label>Телефон</label>
                                <input v-model="order.phone" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label>Индекс</label>
                                <input v-model="order.zip" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label>Регион</label>
                                <input v-model="order.region" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <label>Город</label>
                                <input v-model="order.city" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-4">
                                <label>Улица</label>
                                <input v-model="order.street" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label>Дом</label>
                                <input v-model="order.building" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label>Подъезд</label>
                                <input v-model="order.entrance" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-4">
                                <label>Квартира</label>
                                <input v-model="order.apartment" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="your-order-bottom mb-4">
                        <div class="price">
                            Итого: {{ price }} руб.
                        </div>
                        <button @click="saveOrder()" :disabled="!views.saveButton" class="btn btn-primary">Перейти к оплате</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <label>&nbsp;</label>
                <div class="your-order mb-4">
                    <p>Ваш заказ:</p>
                    
                    <ul v-if="cart.simple">
                        <template v-for="plan in cart.simple.plans">
                            <li v-if="plan.quantity > 0">
                                {{ plan.quantity }} &times; {{ plan.name_ru }}
                            </li>
                        </template>
                    </ul>

                    <ul v-if="cart.pretty">
                        <li v-for="number in cart.pretty.numbers">
                            {{ number }} (красивый номер)
                        </li>
                    </ul>
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