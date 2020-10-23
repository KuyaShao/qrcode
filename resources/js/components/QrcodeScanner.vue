<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div v-if="loading">Loading...</div>
            <div v-else class="card mx-auto">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <p class="error">{{ error }}</p>
                        <p>{{ result }}</p>
                        <qrcode-stream @decode="onDecode" @init="onInit"/>

                    </div>
                    <div class="mt-3">
                        <h5 class="text-muted card-title text-uppercase text-center">
                            {{ names.bussiness_name }}
                        </h5>
                        <h5 class="text-muted card-title text-uppercase text-center">
                            QrCode Scanner

                        </h5>

                    </div>

                </div>
            </div>
            <h6 class="text-center text-muted mb-4 mt-3">#WeHealAsOne #AkoTayoAngMariveles</h6>
        </div>
    </div>

</template>

<script>
import {QrcodeStream, QrcodeDropZone, QrcodeCapture} from 'vue-qrcode-reader'

export default {
    name: "QrcodeScanner",
    components: {QrcodeStream},
    data: () => ({
        result: '',
        error: '',
        names: ''
    }),
    methods: {
        onDecode(result) {
            let currentUrl = window.location.origin + '/scanner'
            window.location = `${currentUrl}/${result}`
        },
        async onInit(promise) {
            try {
                await promise
            } catch (error) {
                if (error.name === 'NotAllowedError') {
                    this.error = "ERROR: you need to grant camera access permisson"
                } else if (error.name === 'NotFoundError') {
                    this.error = "ERROR: no camera on this device"
                } else if (error.name === 'NotSupportedError') {
                    this.error = "ERROR: secure context required (HTTPS, localhost)"
                } else if (error.name === 'NotReadableError') {
                    this.error = "ERROR: is the camera already in use?"
                } else if (error.name === 'OverconstrainedError') {
                    this.error = "ERROR: installed cameras are not suitable"
                } else if (error.name === 'StreamApiNotSupportedError') {
                    this.error = "ERROR: Stream API is not supported in this browser"
                }
            }
        }
    },
    async created() {
        const res = await this.callApi('get', '/api/name')
        if (res.status === 200) {
            this.names = res.data.business
            console.log(this.names.bussiness_name)
        }
    }
}
</script>

<style scoped>
.error {
    font-weight: bold;
    color: red;
}
</style>
