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
                            <label>ФИО (как в заказе)</label>
                            <input v-model="orderLastName" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <button @click="loadOrder()" class="btn btn-primary">Узнать статус</button>
            </div>
            <div class="col-12 col-lg-6">
                <div class="tracking-result">
                    {{ order }}
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
        }
    },
    methods: {
        loadOrder() {
            axios.get('/_tracking', { params: { order_id: this.orderNumber, last_name: this.orderLastName } })
            .then(response => {
                this.order = response.data
            })
        }
    }
}
</script>
