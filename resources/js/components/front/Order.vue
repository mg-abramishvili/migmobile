<template>
    <div class="order">
        <div>
            <form @submit.prevent>
                <input v-model="searchInput" type="text" class="form-control">
                <button></button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lang', 'service'],
    data() {
        return {
            name: '',
            phone: '',
            policy: false,

            errors: [],

            views: {
                success: false,
                error: false,
            }
        }
    },
    methods: {
        save() {
            this.views.error = false
            this.errors = []

            if(!this.name) {
                this.errors.push('Укажите имя')
            }

            if(!this.phone) {
                this.errors.push('Укажите телефон')
            }

            if(!this.policy) {
                this.errors.push('Нужно согласиться с обработкой персональных данных')
            }

            if(this.errors.length > 0) {
                this.views.error = true
                return
            }

            axios.post('/_leads', {
                name: this.name,
                phone: this.phone,
                subject: this.service,
            })
            .then(response => {
                this.name = ''
                this.phone = ''
                this.policy = false
    
                this.views.success = true
    
                setTimeout(() => {
                    this.views.success = false
                }, 3000)
            })
        }
    }
}
</script>