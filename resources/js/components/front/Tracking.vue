<template>
    <div class="container">
        <h1 v-if="lang == 'uz'" class="title-head mb-4">Буюртмани кузатиш</h1>
        <h1 v-else-if="lang == 'tj'" class="title-head mb-4">Пайгирӣ тартибот</h1>
        <h1 v-else class="title-head mb-4">Узнать статус заказа</h1>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-4">
                            <label v-if="lang == 'uz'">Буюртма рақами</label>
                            <label v-else-if="lang == 'tj'">Рақами фармоиш</label>
                            <label v-else>Номер заказа</label>

                            <input v-model="orderNumber" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-4">
                            <label v-if="lang == 'uz'">Фамилия (буюртмада каби)</label>
                            <label v-else-if="lang == 'tj'">Фамилия (тавре ки дар фармоиш)</label>
                            <label v-else>Фамилия (как в заказе)</label>

                            <input v-model="orderLastName" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <button v-if="lang == 'uz'" @click="loadOrder()" class="btn btn-primary">Буюртма ҳолатини билиш</button>
                <button v-else-if="lang == 'tj'" @click="loadOrder()" class="btn btn-primary">Тафтиши статуси фармоиш</button>
                <button v-else @click="loadOrder()" class="btn btn-primary">Узнать статус</button>
            </div>
            <div class="col-12 col-lg-6">
                <div v-if="errors.length" class="alert alert-danger" role="alert">
                    <p v-for="error in errors" class="m-0">{{ error }}</p>
                </div>

                <div v-if="order && order.id" class="tracking-result" style="background-color: rgba(255,255,255,0.5); padding: 15px; color: #777; border-radius: 8px;">
                    <p class="mb-4">
                        <template v-if="lang == 'uz'"><strong>Буюртма №{{ order.id }}</strong> миқдорга {{ order.price }} руб.</template>
                        <template v-else-if="lang == 'tj'"><strong>Фармоиши №{{ order.id }}</strong> ба маблаги {{ order.price }} руб.</template>
                        <template v-else><strong>Заказ №{{ order.id }}</strong> на сумму {{ order.price }} руб.</template>
                    </p>
                    <p class="mb-4">
                        <strong v-if="lang == 'uz'">Буюртма ҳолати: </strong>
                        <strong v-else-if="lang == 'tj'">Статус: </strong>
                        <strong v-else>Статус: </strong>
                        
                        <span v-if="order.status == 'created'">
                            <template v-if="lang == 'uz'">Ишга қабул қилинган</template>
                            <template v-else-if="lang == 'tj'">Ќабул ба кор</template>
                            <template v-else>Принят в работу</template>
                        </span>
                        <span v-if="order.status == 'sent'">
                            <template v-if="lang == 'uz'">Юборилган</template>
                            <template v-else-if="lang == 'tj'">Фиристода</template>
                            <template v-else>Отправлен</template>
                        </span>
                        <span v-if="order.status == 'delivered'">
                            <template v-if="lang == 'uz'">Етказиб</template>
                            <template v-else-if="lang == 'tj'">Расиданаш</template>
                            <template v-else>Доставлен</template>
                        </span>
                    </p>
                    <p class="mb-4">
                        <strong v-if="lang == 'uz'">Учун тўланган: </strong>
                        <strong v-else-if="lang == 'tj'">Пардохта шавад: </strong>
                        <strong v-else>Оплачен: </strong>
                        <template v-if="order.is_paid == true">
                            <span v-if="lang == 'uz'" class="text-success fw-bold">Да</span>
                            <span v-else-if="lang == 'tj'" class="text-success fw-bold">Ҳа</span>
                            <span v-else class="text-success fw-bold">Ҳа</span>
                        </template>
                        <template v-if="order.is_paid == false">
                            <span v-if="lang == 'uz'" class="text-danger fw-bold">Йўқ</span>
                            <span v-else-if="lang == 'tj'" class="text-danger fw-bold">Не</span>
                            <span v-else class="text-danger fw-bold">Нет</span>
                        </template>
                    </p>
                    <p v-if="order.delivery_name && order.delivery_name != 'null'" class="mb-4">
                        <strong v-if="lang == 'uz'">Етказиб бериш:</strong>
                        <strong v-else-if="lang == 'tj'">Бурда расонидан:</strong>
                        <strong v-else>Доставка:</strong>
                        {{ order.delivery_name }}
                    </p>
                    <p v-if="order.delivery_track_number && order.delivery_track_number.length > 2" class="mb-4">
                        <strong v-if="lang == 'uz'">Трек-рақам:</strong>
                        <strong v-else-if="lang == 'tj'">Трек-номер:</strong>
                        <strong v-else>Трек-номер:</strong>
                        {{ order.delivery_track_number }}
                    </p>
                    <p v-if="order.delivery_track_number && order.delivery_track_number.length > 2" class="mb-0">
                        <strong v-if="lang == 'uz'">Кузатиш учун ссылка:</strong>
                        <strong v-else-if="lang == 'tj'">Ссылка пайгирӣ:</strong>
                        <strong v-else>Ссылка для отслеживания:</strong>
                        <br>
                        
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
    props: ['lang'],
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
