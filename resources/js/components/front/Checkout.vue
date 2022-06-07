<template>
    <div class="container">
        <h1 class="title-head mb-4">Оформление заказа</h1>

        <div v-if="cart.simple || cart.pretty" class="row">
            <div class="col-12 col-lg-6">
                <div class="complete-order-form">
                    <div v-if="errors.length" class="alert alert-danger" role="alert">
                        <p v-for="error in errors" class="m-0">{{ error }}</p>
                    </div>

                    <div class="mb-4">
                        <label>ФИО</label>
                        <input v-model="order.name" type="text" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label>Телефон</label>
                        <input v-model="order.phone" type="text" class="form-control">
                    </div>
                    <div class="your-order-bottom mb-4">
                        <div class="price">
                            Итого: {{ price }} руб.
                        </div>
                        <button @click="saveOrder()" :disabled="!views.saveButton" class="btn btn-primary">Перейти к оплате</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
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
                name: '',
                phone: '',
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

            if(!this.order.name) {
                this.errors.push('Укажите имя')
            }
            if(!this.order.phone) {
                this.errors.push('Укажите телефон')
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
                console.log(response.data)
                // window.location.href = response.data
            })
            .catch(errors => {
                this.errors.push(errors.response.data)

                this.views.saveButton = true
            })
        },
    }
}
</script>