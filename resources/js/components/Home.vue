<template>
<<<<<<< HEAD
    <div class="row">
=======
    <div  class="row">
>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
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
<<<<<<< HEAD
                            <router-link class="btn btn-primary btn-block" :to="{name:'qrscanner'}">Scanner</router-link>
                            <router-link class="btn btn-primary btn-block" :to="{name:'encoding'}">Take a picture</router-link>

                           <!-- <qrcode-scanner></qrcode-scanner>-->
=======
                            <qrcode-scanner></qrcode-scanner>
>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="text-center text-muted mb-4 mt-3">#WeHealAsOne #AkoTayoAngMariveles</h6>
        </div>

    </div>

</template>

<script>
<<<<<<< HEAD
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
.camera {
    padding: 25px;
    box-sizing: border-box;

.feed {
    display: block;
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;

    background-color: #171717;
    box-shadow: 6px 6px 12px 0px rgba(0, 0, 0, 0.35);
}

.snap {
    display: block;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    margin: 25px auto;
    background-color: transparentize($
    color: #FFCE00, $
    amount: 0.5);
    border: 1px solid #171717;
    outline: none;
    cursor: pointer;

&
:hover {
    background-color: #FFCE00;
}

&
:active {
    background-color: darken($
    color: #FFCE00, $
    amount: 10);
}

}

.picture {
    display: block;
    width: 100vw;
    height: 100vh;
    padding: 25px;
    box-sizing: border-box;
}

.canvas {
    display: block;
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;
    box-shadow: 4px 4px 12px 8px transparentize($
    color: #171717, $
    amount: 0.5);


}

}
=======
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

>>>>>>> 6ddf25f4b8cf2afa6052c98bff8b2bccb9276bd1
</style>
