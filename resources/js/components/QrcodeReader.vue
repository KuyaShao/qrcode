<template>
    <div>

        <h5 class="text-muted card-title text-uppercase text-center">
            Welcome
        </h5>

        <h5 class="text-muted card-title text-uppercase text-center">
            {{names.lastName+' '+names.middleName+' '+names.lastName}}
        </h5>
        <p class="text-muted card-title text-uppercase text-center">
            Please Screenshot and Save this QRCODE!
        </p>

        <p class="text-muted card-title text-uppercase text-center">
            Thank you for your cooperation
        </p>

        <div class="text-center mt-3">
            <qrcode-vue :value="value" :size="size" level="H"></qrcode-vue>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-success text-uppercase btn-block">Print</button>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-primary text-uppercase btn-block">Download</button>
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
