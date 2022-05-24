<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Заявки</h1>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="leads.length" class="box mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Тема</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="lead in leads" :key="lead.id">
                                <td class="w-25">{{ $filters.datetime(lead.created_at) }}</td>
                                <td>
                                    <template v-if="lead.subject == 'bank_card'">Банковская карта</template>
                                    <template v-if="lead.subject == 'loan'">Денежный займ</template>
                                </td>
                                <td>{{ lead.name }}</td>
                                <td>{{ lead.phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else>Заявок нет.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            leads: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadLeads()
    },
    methods: {
        loadLeads() {
            axios.get('/_admin/leads')
            .then(response => {
                this.leads = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>