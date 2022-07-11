<template>
    <div class="container">
        <h1 class="title-head mb-4">Узнать статус заказа</h1>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-4">
                            <label>Номер заказа</label>
                            <input v-model="orderNumber" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-4">
                            <label>Фамилия (как в заказе)</label>
                            <input v-model="orderLastName" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <button @click="loadOrder()" class="btn btn-primary">Узнать статус</button>
            </div>
            <div class="col-12 col-lg-6">
                <div v-if="errors.length" class="alert alert-danger" role="alert">
                    <p v-for="error in errors" class="m-0">{{ error }}</p>
                </div>

                <div v-if="order && order.id" class="tracking-result" style="background-color: rgba(255,255,255,0.5); padding: 15px; color: #777; border-radius: 8px;">
                    <p class="mb-4">
                        <strong>Заказ №{{ order.id }}</strong>
                         на сумму {{ order.price }} руб.
                    </p>
                    <p class="mb-4">
                        <strong>Статус: </strong>
                        <template v-if="order.is_paid == true">
                            <span class="text-success fw-bold">оплачен</span>
                        </template>
                        <template v-if="order.is_paid == false">
                            <span class="text-warning fw-bold">не оплачен</span>
                        </template>
                    </p>
                    <p v-if="order.delivery_name" class="mb-4">
                        <strong>Доставка:</strong>
                        {{ order.delivery_name }}
                    </p>
                    <p v-if="order.delivery_track_number" class="mb-4">
                        <strong>Трек-номер:</strong>
                        {{ order.delivery_track_number }}
                    </p>
                    <p v-if="order.delivery_track_number" class="mb-0">
                        <strong>Ссылка для отслеживания:</strong><br>
                        
                        <a v-if="order.delivery_name == 'КСЭ'" :href="'https://www.cse.ru/mow/track/?numbers=' + order.delivery_track_number" target="_blank">https://www.cse.ru/mow/track/?numbers={{order.delivery_track_number}}</a>
                        
                        <a v-if="order.delivery_name == 'СДЭК'" :href="'https://www.cdek.ru/ru/tracking?order_id=' + order.delivery_track_number" target="_blank">https://www.cdek.ru/ru/tracking?order_id={{order.delivery_track_number}}</a>
                        
                        <a v-if="order.delivery_name == 'Почта России'" :href="'https://www.pochta.ru/tracking#' + order.delivery_track_number" target="_blank">https://www.pochta.ru/tracking#{{order.delivery_track_number}}</a>
                        
                        <a v-if="order.delivery_name == 'Ozon Rocket'" :href="'https://rocket.ozon.ru/tracking/?SearchId=' + order.delivery_track_number" target="_blank">https://rocket.ozon.ru/tracking/?SearchId={{order.delivery_track_number}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            orderNumber: '',
            orderLastName: '',

            order: {},

            errors: [],
        }
    },
    methods: {
        loadOrder() {
            this.errors = []

            if(!this.orderNumber) {
                this.errors.push('Укажите номер заказа')
            }
            if(!this.orderLastName) {
                this.errors.push('Укажите фамилию (как в заказе)')
            }
            if(this.errors.length) {
                return
            }

            axios.get('/_tracking', { params: { order_id: this.orderNumber, last_name: this.orderLastName } })
            .then(response => {
                if(response.data) {
                    this.order = response.data
                } else {
                    this.errors.push('Заказ с такими данными не найден')
                }
            })
        }
    }
}
</script>
