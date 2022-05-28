<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Номера</h1>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <router-link :to="{ name: 'NumberCreate' }" class="btn btn-primary">Добавить</router-link>
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
                                <th>Номер</th>
                                <th>Оператор</th>
                                <th>Серийный номер</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="number in numbers" :key="number.id">
                                <td>{{ number.number }}</td>
                                <td>{{ number.provider }}</td>
                                <td>{{ number.serial_number }}</td>
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

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadNumbers()
    },
    methods: {
        loadNumbers() {
            axios.get('/_admin/numbers')
            .then(response => {
                this.numbers = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>