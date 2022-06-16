<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>
                        Номера
                        &nbsp;<span v-if="numbers.length" class="text-muted"><small>({{ numbers.length }})</small></span>
                    </h1>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <button @click="toggleFilter()" class="btn btn-outline-primary">Фильтр</button>
                    <router-link :to="{ name: 'NumberImport' }" class="btn btn-primary ms-2">Загрузить XLSX</router-link>
                    <!-- <router-link :to="{ name: 'NumberCreate' }" class="btn btn-primary ms-2">Добавить вручную</router-link> -->
                </div>
            </div>
        </div>

        <div v-if="views.filter" class="bg-white p-4 mt-2 mb-4">
            <p class="fw-bold text-primary">Фильтр</p>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <label class="form-label text-muted">Номер</label>
                    <input v-model="filter.number" type="text" class="form-control">
                </div>
                <div class="col-12 col-lg-3">
                    <label class="form-label text-muted">Серийный номер</label>
                    <input v-model="filter.serial_number" type="text" class="form-control">
                </div>
                <div class="col-12 col-lg-3 text-muted">
                    <label class="form-label text-muted">Тариф</label>
                    <select v-model="filter.plan_id" class="form-select">
                        <option selected value>Любой</option>
                        <option v-for="plan in plans" :value="plan.id">{{ plan.name_ru }}</option>
                    </select>
                </div>
                <div class="col-12 col-lg-3">
                    <label class="form-label">&nbsp;</label>
                    <button @click="filterNumbers()" class="btn btn-primary w-100">Поиск</button>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="numbers.length" class="box mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:30px;font-size:17px">
                                    <div class="form-check">
                                        <input class="form-check-input" @change="selectAll()" value="" type="checkbox">
                                    </div>
                                </th>
                                <th>Номер</th>
                                <th>Серийный номер</th>
                                <th>Тариф</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="number in numbers" :key="number.id" :class="{ 'bg-selected': selected.numbers.includes(number.id) }">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" @change="selectNumber(number.id)" type="checkbox" :checked="selected.numbers.includes(number.id)" :value="number.id" :id="number.id">
                                    </div>
                                </td>
                                <td>{{ number.number }}</td>
                                <td>{{ number.serial_number }}</td>
                                <td>{{ number.plan.name_ru }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else>Номеров нет.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            numbers: [],

            selected: {
                numbers: [],
            },

            filter: {
                number: '',
                serial_number: '',
                plan_id: '',
            },

            views: {
                loading: true,
                filter: false,
            }
        }
    },
    created() {
        this.loadPlans()
        this.loadNumbers()
    },
    methods: {
        loadPlans() {
            axios.get('/_admin/plans')
            .then(response => {
                this.plans = response.data
            })
        },
        loadNumbers() {
            axios.get('/_admin/numbers')
            .then(response => {
                this.numbers = response.data

                this.views.loading = false
            })
        },
        toggleFilter() {
            this.resetFilter()
            
            if(this.views.filter == true) {
                return this.views.filter = false
            }
            if(this.views.filter == false) {
                return this.views.filter = true
            }
        },
        filterNumbers() {
            this.views.loading = true

            axios.get('/_admin/numbers-filter', { params: {
                number: this.filter.number,
                serial_number: this.filter.serial_number,
                plan_id: this.filter.plan_id,
            }})
            .then(response => {
                this.numbers = response.data

                this.views.loading = false
            })
        },
        resetFilter() {
            this.loadNumbers()

            this.filter.number = ''
            this.filter.serial_number = ''
            this.filter.plan_id = ''

            this.selected.numbers = []
        },
        selectNumber(id) {
            if(this.selected.numbers.includes(id)){
                let index = this.selected.numbers.indexOf(id)
                
                if (index > -1) {
                    return this.selected.numbers.splice(index, 1)
                }
            }

            if(!this.selected.numbers.includes(id)) {
                return this.selected.numbers.push(id)
            }
        },
        selectAll() {
            let NumbersFlatArray = this.numbers.map(n => n.id)
            
            if(JSON.stringify(NumbersFlatArray) === JSON.stringify(this.selected.numbers)) {
                return this.selected.numbers = []
            }

            if(NumbersFlatArray != this.selected.numbers) {
                this.selected.numbers = []
                return this.selected.numbers = NumbersFlatArray
            }
        },
    },
    components: {
        Loader
    }
}
</script>