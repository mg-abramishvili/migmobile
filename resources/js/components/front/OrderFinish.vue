<template>
    <div>
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
                        {{ order }}
                    </div>
                    <div class="mb-4">
                        <button @click="saveOrder()" :disabled="!views.saveButton" class="btn btn-primary">Перейти к оплате</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lang', 'order'],
    data() {
        return {
            errors: [],

            views: {
                saveButton: true,
            }
        }
    },
    methods: {
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
                numbers: this.order.selectedNumbers,
                name: this.order.name,
                phone: this.order.phone,
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