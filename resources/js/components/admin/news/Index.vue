<template>
    <div>
        <div class="subheader w-100">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1>Новости</h1>
                </div>
                <div class="col-12 col-lg-6 text-end">
                    <router-link :to="{ name: 'NewsCreate' }" class="btn btn-primary">Добавить</router-link>
                </div>
            </div>
        </div>

        <Loader v-if="views.loading" />

        <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="w-100">
                <div v-if="news.length" class="box mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Заголовок новости</th>
                                <th>Язык</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="newsItem in news" :key="newsItem.id">
                                <td class="w-25">{{ $filters.date(newsItem.created_at) }}</td>
                                <td>{{ newsItem.name }}</td>
                                <td>{{ newsItem.lang }}</td>
                                <td class="text-end">
                                    <router-link :to="{name: 'NewsItemEdit', params: {id: newsItem.id}}" class="btn btn-sm btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p v-else>Новостей нет.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader'

export default {
    data() {
        return {
            news: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadNews()
    },
    methods: {
        loadNews() {
            axios.get('/_admin/news')
            .then(response => {
                this.news = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>