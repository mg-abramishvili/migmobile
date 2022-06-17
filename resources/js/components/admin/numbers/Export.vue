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
                    Выгрузить номера в XLSX
                </h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box px-4 py-4 mb-4">
                <div class="box-tab-content">
                    <a href="/_admin/numbers-export" class="btn btn-primary">Все номера</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            plans: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadPlans()
    },
    methods: {
        loadPlans() {
            axios.get('/_admin/plans')
            .then(response => {
                this.plans = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>