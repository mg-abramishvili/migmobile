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
                            <input v-model="orderFIO" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">Узнать статус</button>
            </div>
            <div class="col-12 col-lg-6">
                <div class="tracking-result">

                </div>
            </div>
        </div>
    </div>
</template>