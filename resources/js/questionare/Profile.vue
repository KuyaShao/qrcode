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
                            {{error}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <datepicker
                            bootstrap-styling
                            :format="customFormatter"
                            v-model="profileData.birthday"
                            :class="[{'is-invalid' :this.errorFor('birthday')}]"
                        ></datepicker>
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('birthday')"
                            :key="'Birthday' + i">
                            {{error}}
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
                            {{error}}
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
                            <option value="other">Other</option>
                        </select>

                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('business_type')"
                            :key="'Street' + i">
                            {{error}}
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
                            {{error}}
                        </div>
                    </div>
                    <div class="form-group">
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
                            {{error}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a City"
                            v-model="profileData.city"
                            :class="[{'is-invalid' :this.errorFor('city')}]"
                        >
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('city')"
                            :key="'City' + i">
                            {{error}}
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
                            {{error}}
                        </div>
                    </div>
                    <button
                        class="btn btn-block btn-secondary"
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
    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'

    export default {
        name: "Profile",
        components: {
            Datepicker
        },
        data() {
            return {
                profileData: {
                    contact_number: null,
                    birthday: null,
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
                userType: null
            }
        },

        methods: {
            customFormatter(date) {
                return moment(date).format('MMMM Do YYYY');
            },
            dates(birthday) {
                this.profileData.birthday = birthday === null ?
                    null : moment(birthday).format('YYYY-MM-DD');
            },
            async profile() {
                console.log(this.profileData.business_name)
                if (this.userType === 'business') {
                    if (this.profileData.business_name.trim() === '') this.errors = {busines_name: ['BusinessName was required']}
                    if (this.profileData.business_type.trim() === '') this.errors = {busines_type: ['BusinessName was required']}
                }
                this.loading = true
                this.dates(this.profileData.birthday)
                const res = await this.callApi('put', `/api/profile/${this.qid}`, this.profileData)
                if (res.status === 200) {
                    this.s(res.data.msg)
                    if (this.userType === 'user') {
                        window.location = '/questionare'
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
