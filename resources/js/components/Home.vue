<template>
    <div  class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div v-if="loading">Loading...</div>
            <div v-else class="card mx-auto">
                <div class="card-body">
                    <div v-if="loading">Loading...</div>
                    <div v-else>
                        <div v-if="userType === 'user'">
                            <qrcode-reader :value="value"></qrcode-reader>
                        </div>
                        <div v-else>
                            <qrcode-scanner></qrcode-scanner>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="text-center text-muted mb-4 mt-3">#WeHealAsOne #AkoTayoAngMariveles</h6>
        </div>

    </div>

</template>

<script>
    import QrcodeReader from "./QrcodeReader";
    import QrcodeScanner from "./QrcodeScanner";

    export default {
        name: "Home",
        components: {
            QrcodeReader,
            QrcodeScanner
        },
        data() {
            return {
                value: "https://example.com",
                size: 100,
                userType: null,
                loading: false
            }

        },
        async created() {
            this.loading = true
            const res = await this.callApi('get', '/api/qrcode/create')
            if (res.status === 200) {
                this.userType = res.data.userType
                // let currentUrl = window.location.origin +'/scanner'
                this.value = res.data.qid
            }
            this.loading = false
        }

    }
</script>

<style scoped>

</style>
