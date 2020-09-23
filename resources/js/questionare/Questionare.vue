<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div class="card mb-4 mx-auto" style="width: 28rem;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-muted text-center">
                        Health Declaration
                    </h5>
                    <div class="mb-3">
                        <div>
                            <h5 class="text-muted text-bold">
                                1. Are you experiencing (nakakaranas ka ba ng):
                            </h5>
                            <div>

                                <label class="pt-2" for="sorethroat">a. Sorethroat (pananakit ng lalamunan)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1a" id="sorethroat1" value="yes">
                                <label class="form-check-label" for="sorethroat1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1a" id="sorethroat2"
                                       value="no">
                                <label class="form-check-label" for="sorethroat2">No</label>
                            </div>

                            <div>

                                <label class="pt-2" for="bodypain">b. Body pains (pananakit ng katawan)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1b" id="bodypain1" value="yes">
                                <label class="form-check-label" for="bodypain1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1b" id="bodypain2"
                                       value="no">
                                <label class="form-check-label" for="bodypain2">No</label>
                            </div>

                            <div>

                                <label class="pt-2" for="headache">c. Headache (pananakit ng ulo)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1c" id="headache1" value="yes">
                                <label class="form-check-label" for="headache1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1c" id="headache2"
                                       value="no">
                                <label class="form-check-label" for="headache2">No</label>
                            </div>

                            <div>

                                <label class="pt-2" for="fever">d. Fever the past few days (pananakit ng katawan)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1d" id="fevera" value="yes">
                                <label class="form-check-label" for="fevera">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1d" id="feverb"
                                       value="no">
                                <label class="form-check-label" for="feverb">No</label>
                            </div>


                            <div>

                                <label class="pt-2" for="cough">e. Cough or colds (ubo o sipon)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1e" id="cougha" value="yes">
                                <label class="form-check-label" for="cougha">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1e" id="coughb"
                                       value="no">
                                <label class="form-check-label" for="coughb">No</label>
                            </div>

                            <div>

                                <label class="pt-2" for="shortness">f. Shortness of breath (hinahabol ang paghinga)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1f" id="shortnessa" value="yes">
                                <label class="form-check-label" for="shortnessa">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"  v-model="data.q1f" id="shortnessb"
                                       value="no">
                                <label class="form-check-label" for="shortnessb">No</label>
                            </div>

                            <div>

                                <label class="pt-2" for="diarrhea">g. Diarrhea (pagtatae)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1g" id="diarrheaa" value="yes">
                                <label class="form-check-label" for="diarrheaa">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q1g" id="diarrheab"
                                       value="no">
                                <label class="form-check-label" for="diarrheab">No</label>
                            </div>


                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                2. Have you worked together or stayed in the same close environment of a confirmed covid-19 case?
                                (May nakasama ka ba o nakatrabahong tao na kumpirmadong may Covid-19 o coronavirus?)
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q2"  value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q2"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                3.Have you had any contact with anyone with fever, cough, colds, and sore throat the past 2 weeks?
                                (Mayroon ka bang nakasama na may lagnat, ubo, sipon o sakit ng lalamunan sa nakalipas na 2 linggo?)
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q3" value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q3"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                4. Have you travelled outside the Philippines in the last 14 days?
                                (Ikaw ba ay nagbiyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?)
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q4" value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q4"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                5. Have you travelled to any areas in NCR aside from your home?
                                (Ikaw ba ay nagpunta sa ibang parte ng NCR o Metro Manila bukod sa iyong bahay?)
                                Specify where if your answer is yes.
                                (Sabihan kung saan kung ang sagot mo ay oo.)
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q5" value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q5"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                            <div class="form-check form-check-inline">

                                <input class="form-control" type="text" v-model="data.q5a"
                                       placeholder="where (saan)">

                            </div>
                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                6. I am a PWD
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q6" value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q6"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h5 class="text-muted text-bold mb-2">
                                7. I am pregnant
                            </h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q7" value="yes">
                                <label class="form-check-label" for="sorethroata">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" v-model="data.q7"
                                       value="no">
                                <label class="form-check-label" for="sorethroatb">No</label>
                            </div>
                        </div>

                        <div class="pt3">
                            <h6 class="text-muted">
                                I hereby authorize QrCodeTracker Philippines to collect and process the data indicated in this survey for the purpose of effecting control of the COVID-19 infection.
                                I understand that my personal information is protected by RA 10173, Data Privacy Act of 2012,
                                that I am required by RA 11469, Bayanihan to Heal As One Act,
                                to provide truthful information, and that this health declaration is in accordance with memoranda
                                issued by various government institutions,
                                including the Joint Memorandum Circular No. 20-04-A Series 2020
                                by the Department of Trade and Industry and the Department of Labor and Employment,
                                Memorandum Circular No. 2020-004 by the Department of Tourism, and Memorandum Circular No. 2020-077
                                by the Department of the Interior and Local Government.
                            </h6>

                        </div>
                    </div>


                    <button
                        class="btn btn-block btn-secondary"
                        @click="healthDeclaration"
                        :loading="loading"
                        :disabled="loading"
                    >Submit</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        name: "Questionare",
        data(){
            return{
                data:{
                    q1a:null,
                    q1b:null,
                    q1c:null,
                    q1d:null,
                    q1e:null,
                    q1f:null,
                    q2:null,
                    q3:null,
                    q4:null,
                    q5:null,
                    q5a:null,
                    q6:null,
                    q7:null,
                },
                loading:false
            }
        },
        methods: {
            async healthDeclaration(){
                this.loading = true
                const res = await this.callApi('post','/health-declaration',this.data)
                if(res.status === 200){
                    this.s(res.data.msg)
                    window.location = `/qrcode`
                }else{
                    if(res.status === 422){
                        for(let i in res.data.errors){
                            this.e(res.data.errors[i][0])
                        }
                    }
                    this.swr()
                }
                this.loading = false
            },
            errorFor(field) {
                return this.hasErrors && this.errors[field] ? this.errors[field] : null
            }
        },
        computed: {
            hasErrors() {
                return 422 === this.status || this.errors !== null
            },
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

    .is-invalid {
        border-color: #b22222;
        background-image: none;
    }

    .invalid-feedback {
        color: #b22222;
    }
</style>
