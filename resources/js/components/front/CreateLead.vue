<template>
    <div class="main-bank-card-form">
        <div v-if="views.error" class="alert alert-danger">
            <small v-for="error in errors" class="d-block">
                {{ error }}
            </small>
        </div>

        <div v-if="views.success" class="alert alert-success">
            Заявка успешно отправлена!
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <label>
                    <template v-if="lang == 'uz'">
                        Исм
                    </template>
                    <template v-else-if="lang == 'tj'">
                        Ном
                    </template>
                    <template v-else>
                        Имя
                    </template>
                </label>

                <input v-if="lang == 'uz'" v-model="name" type="text" class="form-control" placeholder="Сизнинг исмингиз нима?">
                <input v-else-if="lang == 'tj'" v-model="name" type="text" class="form-control" placeholder="Номи Шумо чист">
                <input v-else v-model="name" type="text" class="form-control" placeholder="Как вас зовут">
            </div>
            <div class="col-12 col-lg-6">
                <label>
                    <template v-if="lang == 'uz'">
                        Телефон
                    </template>
                    <template v-else-if="lang == 'tj'">
                        Телефон
                    </template>
                    <template v-else>
                        Телефон
                    </template>
                </label>

                <input v-if="lang == 'uz'" v-model="phone" type="text" class="form-control" placeholder="Сизнинг телефон рақамингиз">
                <input v-else-if="lang == 'tj'" v-model="phone" type="text" class="form-control" placeholder="Рақами телефони Шумо">
                <input v-else v-model="phone" type="text" class="form-control" placeholder="Ваш номер телефона">
            </div>
        </div>
        <div class="form-check">
            <input v-model="policy" class="form-check-input" type="checkbox" :id="'check_' + service">
            <label class="form-check-label" :for="'check_' + service">
                <template v-if="lang == 'uz'">
                    Шахсий маълумотларни қайта ишлашга розиман
                </template>
                <template v-else-if="lang == 'tj'">
                    Ман барои коркарди маълумоти шахсӣ розӣ ҳастам
                </template>
                <template v-else>
                    Согласен с обработкой персональных данных
                </template>
            </label>
        </div>
        <button @click="save()" class="btn btn-primary">
            <template v-if="lang == 'uz'">
                Расмийлаштириш
            </template>
            <template v-else-if="lang == 'tj'">
                Дархост намудан
            </template>
            <template v-else>
                Оформить
            </template>
        </button>
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
