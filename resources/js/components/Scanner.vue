<template>
    <div class="row">
        <div v-if="loading">Loading...</div>
        <div v-else class="col-md-8 col-sm-8 cool-lg-8 mx-auto">
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted text-uppercase text-center">
                        Pass this data
                    </h5>
                    <div class="mt-4">
                        <label>{{this.user}}</label>
                        <p>Client Name</p>
                    </div>

                    <div class="form-group mt-2">
                        <input type="text" v-model="data.temperature" class="form-control" placeholder="Temperature">
                        <label for="temperature" class="text-center" >Temperature</label>
                    </div>
                    <button class="btn btn-secondary btn-block" @click="scanner" :loading="loading" :disabled="loading">Submit</button>
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
                console.log(this.temperature)
                const res = await this.callApi('post','/scanner',this.data)
                if(res.status === 200 || res.status === 201){
                    this.s(res.data.msg)
                    window.location = '/qrcode'
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
            const res = await this.callApi('get', `/scanner/${this.$route.params.id}/edit`)
            if (res.status === 200) {
                this.user = res.data.profile.fullName
                this.data.name = res.data.business.fullName
                this.data.id = res.data.profile.id
                this.data.business_name = res.data.business.business_name
                this.data.business_type = res.data.business.business_type
                this.data.from = res.data.business.address
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
