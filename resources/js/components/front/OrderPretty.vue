<template>
    <div class="container">
        <h1 v-if="lang == 'uz'" class="title-head mb-4">Чиройли рақамларни сотиб олиш</h1>
        <h1 v-else-if="lang == 'tj'" class="title-head mb-4">Хариди рақамҳои зебо</h1>
        <h1 v-else class="title-head mb-4">Купить красивые номера</h1>

        <div class="order-numbers">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <form @submit.prevent="search()">
                        <input v-if="lang == 'uz'" v-model="searchInput" placeholder="Сизга керакли рақамларни киритинг" type="text" class="form-control">
                        <input v-else-if="lang == 'tj'" v-model="searchInput" placeholder="Рақами дилхоҳро дохил кунед" type="text" class="form-control">
                        <input v-else v-model="searchInput" placeholder="введите желаемые цифры" type="text" class="form-control">
                        
                        <button v-if="!views.loading" type="submit" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                        <button v-if="views.loading" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span v-if="lang == 'uz'" class="visually-hidden">Қидирув...</span>
                            <span v-else-if="lang == 'tj'" class="visually-hidden">Ҷустуҷӯ...</span>
                            <span v-else class="visually-hidden">Поиск...</span>
                        </button>
                    </form>

                    <p v-if="views.searchResult && resultCounter() > 0" class="text-muted">
                        <template v-if="lang == 'uz'">Рақамлар топилди: {{ resultCounter() }}</template>
                        <template v-else-if="lang == 'tj'">Рақамҳои ёфтшуда: {{ resultCounter() }}</template>
                        <template v-else>Найдено номеров: {{ resultCounter() }}</template>
                    </p>
                    
                    <p v-if="views.searchResult && resultCounter() == 0" class="text-muted">
                        <template v-if="lang == 'uz'">Ҳеч нима топилмади.</template>
                        <template v-else-if="lang == 'tj'">Ҳеҷ чиз ёфт нашуд.</template>
                        <template v-else>Ничего не найдено.</template>
                    </p>
                    
                    <div v-if="views.searchResult && resultCounter() > 0" class="order-numbers-results">
                        <div class="row">
                            <div v-if="numbers.beeline.length" class="col-12 col-lg-12 mb-4">
                                <h5>Билайн</h5>
                                <ul>
                                    <li v-for="beelineNumberItem in numbers.beeline">
                                        {{ beelineNumberItem }}
                                        <button v-if="!selected.numbers.includes(beelineNumberItem)" @click="addToCart(beelineNumberItem)" class="btn btn-sm btn-success">
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
                                        <button v-if="!selected.numbers.includes(mtsNumberItem)" @click="addToCart(mtsNumberItem)" class="btn btn-sm btn-success">
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
                                        <button v-if="!selected.numbers.includes(megafonNumberItem)" @click="addToCart(megafonNumberItem)" class="btn btn-sm btn-success">
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
                                        <button v-if="!selected.numbers.includes(tele2NumberItem)" @click="addToCart(tele2NumberItem)" class="btn btn-sm btn-success">
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
                    <div v-if="prices" class="disclaimer mb-4">
                        <p v-if="prices.filter(price => price.type == 'pretty')[0]">
                            <template v-if="lang == 'uz'">1 рақам учун нарх = <strong>{{ prices.filter(price => price.type == 'pretty')[0].price }} руб</strong>.</template>
                            <template v-else-if="lang == 'tj'">Нарх барои 1 рақам = <strong>{{ prices.filter(price => price.type == 'pretty')[0].price }} руб</strong>.</template>
                            <template v-else>Цена за 1 номер = <strong>{{ prices.filter(price => price.type == 'pretty')[0].price }} руб</strong>.</template>
                        </p>

                        <p v-if="prices.filter(price => price.type == 'pretty')[1]">
                            <template v-if="lang == 'uz'">3 ёки ундан кўп рақам сотиб олинаётганда, 1 рақам учун нарх = <strong>{{ prices.filter(price => price.type == 'pretty')[1].price }} руб</strong>.</template>
                            <template v-else-if="lang == 'tj'">Ҳангоми харидани 3 рақам ва зиёда аз он, нархи 1 рақам = <strong>{{ prices.filter(price => price.type == 'pretty')[1].price }} руб</strong>.</template>
                            <template v-else>При покупке 3 номеров и более, цена за 1 номер = <strong>{{ prices.filter(price => price.type == 'pretty')[1].price }} руб</strong>.</template>
                        </p>
                    </div>
                    <div v-if="priceWithQuantity > 0" class="order-page-cart">
                        <p v-if="lang == 'uz'" class="fw-bold">Буюртмангиз:</p>
                        <p v-else-if="lang == 'tj'" class="fw-bold">Фармоиши Шумо:</p>
                        <p v-else class="fw-bold">Ваш заказ:</p>
                        <ul>
                            <li v-for="orderNumItem in selected.numbers">
                                {{  orderNumItem }}
                                <button @click="removeFromCart(orderNumItem)" class="btn btn-sm btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                        <p v-if="priceWithQuantity > 0">{{ priceWithQuantity }} руб.</p>
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
            numbers: {},
            prices: [],
            settings: {},

            searchInput: '',

            selected: {
                numbers: [],
            },

            views: {
                loading: false,
                searchResult: false, 
            }
        }
    },
    computed: {
        quantity() {
            return this.selected.numbers.length
        },
        price() {
            let quantity = this.selected.numbers.length

            if(quantity == 0) {
                return 0
            }

            let conditions = this.prices.filter(price => price.type == 'pretty')
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
        this.loadCart()
        this.loadPrices()
        this.loadSettings()
    },
    methods: {
        loadCart() {
            axios.get('/_cart', { params: { type: 'pretty' } })
            .then(response => {
                if(response.data) {
                    this.selected.numbers = response.data.numbers
                }
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
        saveCart() {
            axios.post('/_pretty-cart', {
                pretty_cart: { "numbers": this.selected.numbers, "price": this.priceWithQuantity }
            })
        },
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
            this.selected.numbers.push(number)

            this.saveCart()
        },
        removeFromCart(number) {
            let index = this.selected.numbers.indexOf(number)
            if (index > -1) {
                this.selected.numbers.splice(index, 1)
            }
            this.saveCart()
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
        proceedToCheckout() {
            this.saveCart()
            
            window.location.href = '/checkout'
        }
    },
}
</script>