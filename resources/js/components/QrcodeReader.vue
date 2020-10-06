<template>
    <div ref="printMe">


        <div class="text-center mt-3">
            <qrcode-vue :value="value" :size="size" level="H"></qrcode-vue>
        </div>
        <div class="mt-3">
            <h5 class="text-muted card-title text-uppercase text-center">
                Name: {{ names.firstName + ' ' + names.lastName }}
            </h5>
            <p class="text-muted card-title text-uppercase text-center">
                Please Screenshot, Print or download this  QRCODE!
            </p>

            <p class="text-muted card-title text-uppercase text-center">
                Thank you for your cooperation
            </p>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-secondary text-uppercase btn-block" @click="print('/pdf')">Print</button>
        </div>
    </div>
</template>

<script>
import QrcodeVue from 'qrcode.vue'

export default {
    name: "QrcodeReader",
    components: {
        QrcodeVue
    },
    props: ['value'],
    data() {
        return {

            size: 300,
            loading: false,
            names: ''
        }
    },
    methods: {
        print(url) {
            window.print();
        },
    },
    async created() {
        this.loading = true
        const res = await this.callApi('get', '/api/name');
        if (res.status === 200) {
            this.names = res.data.names
        }

        this.loading = false
    }

}
</script>

<style scoped>

</style>
