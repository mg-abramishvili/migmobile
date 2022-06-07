<template>         
    <div class="subheader w-100">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h1>
                    <router-link :to="{ name: 'Numbers' }">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </router-link>
                    Добавление номеров
                </h1>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box px-4 py-4 mb-4">
                <div class="box-tab-content">
                    <button @click="addRow()" class="btn btn-sm btn-outline-primary mb-4">Добавить строку</button>

                    <div v-for="(numberRow, index) in numbers" class="px-3 py-3 bg-light mb-1">
                        <div class="row align-items-center">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div>
                                            <input v-model="numberRow.number" type="text" class="form-control" placeholder="номер (без кода страны)">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div>
                                            <select v-model="numberRow.plan_id" class="form-select">
                                                <option v-for="plan in plans" :value="plan.id">{{ plan.name_ru }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div>
                                            <input v-model="numberRow.serial_number" type="text" class="form-control" placeholder="серийный номер">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center">
                                    <button @click="deleteRow(index)" class="btn btn-sm btn-outline-danger">
                                        &mdash;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <button @click="save()" :disabled="!views.saveButton" class="btn btn-primary mt-3">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numbers: [],
            plans: [],

            views: {
                saveButton: true,
            }
        }
    },
    created() {
        this.loadPlans()
        this.addRow()
    },
    methods: {
        loadPlans() {
            axios.get('/_plans')
            .then(response => {
                this.plans = response.data
            })
        },
        addRow() {
            this.numbers.push({
                number: '',
                plan_id: '',
                serial_number: '',
            })
        },
        deleteRow(index) {
            if(this.numbers.length <= 1) {
                return
            }
            this.numbers.splice(index, 1)
        },
        save() {
            let errors = []

            this.numbers.forEach(number => {
                if(!number.number || !number.plan_id || !number.serial_number) {
                    errors.push(1)
                }
            })

            if(errors.length > 0) {
                return this.$swal({
                    text: 'Заполните все поля',
                    icon: 'error',
                })
            }

            this.views.saveButton = false

            axios.post('/_admin/numbers', {
                numbers: this.numbers
            })
            .then(response => {
                this.views.saveButton = true

                this.$router.push({ name: 'Numbers' })
            })
            .catch(errors => {
                this.views.saveButton = true
                
                return this.$swal({
                    text: 'Ошибка',
                    icon: 'error',
                })
            })
        },
    },
}
</script>