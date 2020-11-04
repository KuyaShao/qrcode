<template>
    <div class="row">
        <div v-if="loading">Loading...</div>
        <div v-else class="col-md-8 col-sm-8 cool-lg-8 mx-auto">
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted text-uppercase text-center">
                        {{this.user}}
                    </h5>


                    <div class="form-group mt-2">
                        <input type="number" v-model="data.temperature" class="form-control" placeholder="00.0">
                        <label for="temperature" class="text-center" >Insert Temperature</label>
                    </div>
                    <button class="btn btn-primary btn-block" @click="scanner" :loading="loading" :disabled="loading">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Scanner",
        data() {
            return {
                data: {
                    id:null,
                    business_name:null,
                    businees_type:null,
                    temperature:null,
                    name:null
                },
                user:null,
                loading:false
            }
        },
        methods: {
            async scanner(){
                this.loading = true
                const res = await this.callApi('post','/api/scanner',this.data)
                if(res.status === 200 || res.status === 201){
                    window.location = '/qrscanner'
                }else{
                    if(res.status === 422){
                        for(let i in res.data.errors){
                            this.e(res.data.errors[i][0])
                        }
                    }
                    this.swr()
                }
                this.loading = false
            }
        },

        async created() {
            this.loading = true
            const res = await this.callApi('get', `/api/scanner/${this.$route.params.id}/edit`)
            if (res.status === 200) {
                this.user = res.data.profile.fullName
                this.data.name = res.data.business.fullName
                this.data.id = res.data.profile.id
                this.data.business_name = res.data.business.business_name
                this.data.business_type = res.data.business.business_type
                this.data.from = res.data.business.address
            }else{
                this.swr()
                this.loading=true
                window.location = '/qrcode'
                this.loading = false
            }
            this.loading = false
        }
    }
</script>

<style scoped>
    label {
        font-size: 0.7rem;
        text-transform: uppercase;
        color: gray;
        font-weight: bolder;
    }
    p{
        font-size: 0.7rem;
        text-transform: uppercase;
        color: gray;
        font-weight: bolder;
    }

</style>
