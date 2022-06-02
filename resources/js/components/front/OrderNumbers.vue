<template>
    <div class="order-numbers">
        <div class="row">
            <div class="col-12 col-lg-9">
                <form @submit.prevent="search()">
                    <div class="row">
                        <div class="col-9 col-xl-11">
                            <input v-model="searchInput" placeholder="введите желаемые цифры, например 888" type="text" class="form-control">
                        </div>
                        <div class="col-3 col-xl-1">
                            <button v-if="!views.loading" type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                            <button v-if="views.loading" class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span class="visually-hidden">Поиск...</span>
                            </button>
                        </div>
                    </div>
                </form>

                <p v-if="views.searchResult && resultCounter() > 0">Найдено номеров: {{ resultCounter() }}</p>
                <p v-if="views.searchResult && resultCounter() == 0">Ничего не найдено.</p>
                
                <div v-if="views.searchResult && resultCounter() > 0" class="order-numbers-results">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>Билайн</h5>
                            <ul>
                                <li v-for="beelineNumberItem in numbers.beeline">
                                    {{ beelineNumberItem }}
                                    <button v-if="!order.selectedNumbers.includes(beelineNumberItem)" @click="addToCart(beelineNumberItem)" class="btn btn-sm btn-outline-primary">+</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>МТС</h5>
                            <ul>
                                <li v-for="mtsNumberItem in numbers.mts">
                                    {{ mtsNumberItem }}
                                    <button v-if="!order.selectedNumbers.includes(mtsNumberItem)" @click="addToCart(mtsNumberItem)" class="btn btn-sm btn-outline-primary">+</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>Мегафон</h5>
                            <ul>
                                <li v-for="megafonNumberItem in numbers.megafon">
                                    {{ megafonNumberItem }}
                                    <button v-if="!order.selectedNumbers.includes(megafonNumberItem)" @click="addToCart(megafonNumberItem)" class="btn btn-sm btn-outline-primary">+</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>Теле2</h5>
                            <ul>
                                <li v-for="tele2NumberItem in numbers.tele2">
                                    {{ tele2NumberItem }}
                                    <button v-if="!order.selectedNumbers.includes(tele2NumberItem)" @click="addToCart(tele2NumberItem)" class="btn btn-sm btn-outline-primary">+</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="order-page-cart">
                    <p>Ваш заказ:</p>
                    <ul>
                        <li v-for="orderNumItem in order.selectedNumbers">
                            {{  orderNumItem }}
                            <button @click="removeFromCart(orderNumItem)" class="btn btn-sm btn-outline-primary">-</button>
                        </li>
                    </ul>
                    <button class="btn-primary">Оформить заказ</button>
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
            searchInput: '',

            numbers: {},

            order: {
                name: '',
                phone: '',
                selectedNumbers: [],
            },

            errors: [],

            views: {
                loading: false,
                searchResult: false, 
                success: false,
                error: false,
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
        }
    }
}
</script>