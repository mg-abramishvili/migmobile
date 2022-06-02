<template>
    <div class="container">
        <template v-if="views.step == 'searchNumbers'">
            <h1 class="title-head mb-4">Заказ номера</h1>

            <div class="order-numbers">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <form @submit.prevent="search()">
                            <input v-model="searchInput" placeholder="введите желаемые цифры, например 888" type="text" class="form-control">
                            
                            <button v-if="!views.loading" type="submit" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                            <button v-if="views.loading" class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Поиск...</span>
                            </button>
                        </form>

                        <p v-if="views.searchResult && resultCounter() > 0" class="text-muted">Найдено номеров: {{ resultCounter() }}</p>
                        <p v-if="views.searchResult && resultCounter() == 0" class="text-muted">Ничего не найдено.</p>
                        
                        <div v-if="views.searchResult && resultCounter() > 0" class="order-numbers-results">
                            <div class="row">
                                <div v-if="numbers.beeline.length" class="col-12 col-lg-12 mb-4">
                                    <h5>Билайн</h5>
                                    <ul>
                                        <li v-for="beelineNumberItem in numbers.beeline">
                                            {{ beelineNumberItem }}
                                            <button v-if="!order.selectedNumbers.includes(beelineNumberItem)" @click="addToCart(beelineNumberItem)" class="btn btn-sm btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="numbers.mts.length" class="col-12 col-lg-12 mb-4">
                                    <h5>МТС</h5>
                                    <ul>
                                        <li v-for="mtsNumberItem in numbers.mts">
                                            {{ mtsNumberItem }}
                                            <button v-if="!order.selectedNumbers.includes(mtsNumberItem)" @click="addToCart(mtsNumberItem)" class="btn btn-sm btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="numbers.megafon.length" class="col-12 col-lg-12 mb-4">
                                    <h5>Мегафон</h5>
                                    <ul>
                                        <li v-for="megafonNumberItem in numbers.megafon">
                                            {{ megafonNumberItem }}
                                            <button v-if="!order.selectedNumbers.includes(megafonNumberItem)" @click="addToCart(megafonNumberItem)" class="btn btn-sm btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="numbers.tele2.length" class="col-12 col-lg-12 mb-4">
                                    <h5>Теле2</h5>
                                    <ul>
                                        <li v-for="tele2NumberItem in numbers.tele2">
                                            {{ tele2NumberItem }}
                                            <button v-if="!order.selectedNumbers.includes(tele2NumberItem)" @click="addToCart(tele2NumberItem)" class="btn btn-sm btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div v-if="order.selectedNumbers.length" class="order-page-cart">
                            <p class="fw-bold">Ваш заказ:</p>
                            <ul>
                                <li v-for="orderNumItem in order.selectedNumbers">
                                    {{  orderNumItem }}
                                    <button @click="removeFromCart(orderNumItem)" class="btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                            <button @click="goToStep('completeOrder')" class="btn btn-primary btn-white">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="views.step == 'completeOrder'">
            <h1 class="title-head mb-4">Оформление заказа</h1>

            <div class="row">
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
                        <div class="mb-4">
                            <p>Ваш заказ:</p>
                            <ul>
                                <li v-for="orderNumItem in order.selectedNumbers">{{ orderNumItem }}</li>
                            </ul>
                        </div>
                        <div class="mb-4">
                            <button @click="saveOrder()" class="btn btn-primary">Перейти к оплате</button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="views.step == 'success'">
            <h1 class="title-head mb-4">Заказ успешно оформлен</h1>

            <p>Номер заказа: {{ order.id }}</p>
        </template>
    </div>
</template>

<script>
export default {
    props: ['lang'],
    data() {
        return {
            searchInput: '',

            numbers: {},

            order: {
                name: '',
                phone: '',
                selectedNumbers: [],
                id: '',
            },

            errors: [],

            views: {
                step: 'searchNumbers',
                loading: false,
                searchResult: false, 
            }
        }
    },
    methods: {
        resultCounter() {
            let counter = []

            if(this.numbers && this.numbers.beeline && this.numbers.beeline.length) {
                counter.push(this.numbers.beeline.length)
            }
            if(this.numbers && this.numbers.mts && this.numbers.mts.length) {
                counter.push(this.numbers.mts.length)
            }
            if(this.numbers && this.numbers.megafon && this.numbers.megafon.length) {
                counter.push(this.numbers.megafon.length)
            }
            if(this.numbers && this.numbers.tele2 && this.numbers.tele2.length) {
                counter.push(this.numbers.tele2.length)
            }

            return counter.reduce((a, b) => a + b, 0)
        },
        addToCart(number) {
            this.order.selectedNumbers.push(number)
        },
        removeFromCart(number) {
            let index = this.order.selectedNumbers.indexOf(number)
            if (index > -1) {
                this.order.selectedNumbers.splice(index, 1)
            }
        },
        goToStep(step) {
            this.views.step = step
        },
        search() {
            if(!this.searchInput) {
                return
            }

            this.views.loading = true
            
            axios.get(`/numbers/${this.searchInput}`)
            .then(response => {
                this.numbers = response.data

                this.views.loading = false

                this.views.searchResult = true
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

            axios.post('/_order', {
                numbers: this.order.selectedNumbers,
                name: this.order.name,
                phone: this.order.phone,
            })
            .then(response => {
                this.views.step = 'success'
                this.order.id = response.data
            })
        },
    }
}
</script>