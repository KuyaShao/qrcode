<template>
    <div class="row">
        <div v-if="loading">Loading</div>
        <div v-else class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div class="card mb-4 mx-auto" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title text-uppercase text-muted text-center">
                        Complete the Profile
                    </h5>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Contact Number (09xxxxxxxxx)"
                            v-model="profileData.contact_number"
                            :class="[{'is-invalid' :this.errorFor('contact_number')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('contact_number')"
                            :key="'Contact Number' + i">
                            {{ error }}

                        </div>
                    </div>

                    <div class="form-group" v-if="userType === 'business'">
                        <label for="business_name">Business Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Business Name"
                            v-model="profileData.business_name"
                            :class="[{'is-invalid' :this.errorFor('business_name')}]"
                        >

                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('business_name')"
                            :key="'Street' + i">
                            {{ error }}
                        </div>
                    </div>
                    <div class="form-group" v-if="userType === 'business'">
                        <label for="business_type">Business Type</label>
                        <select class="form-control" v-model="profileData.business_type"
                                :class="[{'is-invalid' :this.errorFor('business_type')}]"
                        >
                            <option value=""></option>
                            <option value="food">Food</option>
                            <option value="clothing">Clothing</option>
                            <option value="gym">Gym</option>
                            <option value="factory">Factory</option>
                            <option value="company">Company</option>

                            <option value="transportation">Transportation</option>
                            <option value="goverment">Goverment</option>

                            <option value="other">Other</option>
                        </select>

                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('business_type')"
                            :key="'Street' + i">

                            {{ error }}

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Street"
                            v-model="profileData.street"
                            :class="[{'is-invalid' :this.errorFor('street')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('street')"
                            :key="'Street' + i">

                            {{ error }}
                        </div>
                    </div>
                    <div class="form-group" v-if="userType === 'business'">
                        <label for="barangay">Barangay</label>

                        <select class="form-control" v-model="profileData.barangay"
                                :class="[{'is-invalid' :this.errorFor('barangay')}]"
                        >
                           <option v-for="(barangay,i) in barangayData" :key="'BarangayData'+i" :value="barangay">{{barangay}}</option>
                        </select>

                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('barangay')"
                            :key="'Barangay' + i">
                            {{ error }}
                        </div>
                    </div>

                    <div v-else class="form-group">

                        <label for="barangay">Barangay</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Barangay"
                            v-model="profileData.barangay"
                            :class="[{'is-invalid' :this.errorFor('barangay')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('barangay')"
                            :key="'Barangay' + i">

                            {{ error }}
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="city">Municipality</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Municipality"
                            v-model="profileData.city"
                            :class="[{'is-invalid' :this.errorFor('city')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('city')"
                            :key="'City' + i">

                            {{ error }}

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Province"
                            v-model="profileData.province"
                            :class="[{'is-invalid' :this.errorFor('province')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('province')"
                            :key="'Province' + i">

                            {{ error }}

                        </div>
                    </div>
                    <button
                        class="btn btn-block btn-primary"
                        @click="profile"
                        :loading="loading"
                        :disabled="loading"
                    >Save
                    </button>
                </div>
            </div>
        </div>
    </div>


</template>

<script>


export default {
    name: "Profile",
    data() {
        return {
            profileData: {
                contact_number: null,
                barangay: null,
                city: null,
                street: null,
                province: null,
                business_name: '',
                business_type: ''
            },
            contact_number: null,
            qid: null,
            errors: null,
            loading: false,
            userType: null,
            barangayData:[
                'Alas‑asin',
                'Alion',
                'Balon‑Anito',
                'Baseco Country',
                'Batangas II',
                'Biaan',
                'Cabcaben',
                'Camaya',
                'Ipag',
                'Lucanin',
                'Malaya',
                'Maligaya',
                'Mt. View',
                'Poblacion',
                'San Carlos',
                'San Isidro',
                'Sisiman',
                'Townsite',

            ]
        }
    },

    methods: {
        async profile() {
            console.log(this.profileData.business_name)
            if (this.userType === 'business') {
                if (this.profileData.business_name.trim() === '') this.errors = {busines_name: ['BusinessName was required']}
                if (this.profileData.business_type.trim() === '') this.errors = {busines_type: ['BusinessName was required']}
            }
            this.loading = true
            const res = await this.callApi('put', `/api/profile/${this.qid}`, this.profileData)
            if (res.status === 200) {
                this.s(res.data.msg)
                if (this.userType === 'user') {
                    this.$router.push('questionare')
                } else {
                    window.location = '/qrcode'
                }

            } else {
                if (res.status === 422) {
                    this.errors = res.data.errors
                }
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
    },

    async created() {
        this.loading = true
        const res = await this.callApi('get', '/api/profileShow')
        if (res.status === 200) {
            this.qid = res.data.qid
            this.userType = res.data.userType
            if (this.userType === 'business') {
                this.profileData.city = 'Mariveles'
                this.profileData.province = 'Bataan'
            }
        } else {
            this.swr()
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

.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}
</style>
