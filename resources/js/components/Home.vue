<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div v-if="loading">Loading...</div>
            <div v-else class="card mx-auto">
                <div class="card-body">
                    <div v-if="userType === 'user'">
                        <h5 class="text-muted card-title text-uppercase text-center">
                            Please Screenshot and Save this QRCODE!
                        </h5>
                    </div>
                   <div v-else>
                       <h5 class="text-muted card-title text-uppercase text-center">
                           Please Screenshot and Save this QRCODE and Download any Scanner on playstore in order for you to scan qrcodes!
                       </h5>
                   </div>
                    <div class="text-center mt-3">
                        <qrcode-vue :value="value" :size="size" level="H"></qrcode-vue>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import QrcodeVue from 'qrcode.vue'
    export default {
        name: "Home",
        components:{
            QrcodeVue
        },
        data(){
            return{
                value:"https://example.com" ,
                size:100,
                userType:null,
                loading:false
            }

        },
        async created() {
            this.loading = true
            const res = await this.callApi('get','/api/qrcode/create')
            if(res.status === 200){
                this.userType = res.data.userType
                let currentUrl = window.location.origin +'/scanner'
                this.value = `${currentUrl}/${res.data.qid}`
            }
            this.loading = false
        }
    }
</script>

<style scoped>

</style>
