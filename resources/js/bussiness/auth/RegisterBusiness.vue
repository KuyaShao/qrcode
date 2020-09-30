<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div class="card mx-auto" style="width: 24rem">
                <div class="card-body">
                    <h5 class="card-title text-center text-uppercase text-muted">
                        Register for business
                    </h5>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a First Name"
                            v-model="registerData.firstName"
                            @keyup.enter="register"
                            :class="[{'is-invalid':this.errorFor('firstName')}]">
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('firstName')" :key="'Email' + i"
                        >
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Middle Name"
                            v-model="registerData.middleName"
                            @keyup.enter="register"
                            :class="[{'is-invalid':this.errorFor('middleName')}]">
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('middleName')" :key="'Email' + i">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter a Last Name"
                            v-model="registerData.lastName"
                            @keyup.enter="register"
                            :class="[{'is-invalid':this.errorFor('lastName')}]">
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('lastName')" :key="'Email' + i">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Enter a Email Address"
                            v-model="registerData.email"
                            @keyup.enter="register"
                            :class="[{'is-invalid':this.errorFor('email')}]">
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('email')" :key="'Email' + i">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Enter a Password"
                            v-model="registerData.password"
                            @keyup.enter="register"
                            :class="[{'is-invalid':this.errorFor('password')}]">
                        <div
                            class="invalid-feedback"
                            v-for="(error,i) in this.errorFor('password')" :key="'Email' + i">
                            {{error}}
                        </div>
                    </div>
                    <button
                        @click="register"
                        :disabled="isAdding"
                        class="btn btn-secondary btn-block"
                    >Register
                    </button>
                </div>

            </div>

            <div class="card mt-3 pt-3 mb-4 mx-auto" style="width: 24rem">
                <div class="card-body text-center">
                    <p class="text-muted">
                        Do you have an account?
                        <router-link :to="{name:'login-business'}">
                            Login
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegisterBusiness",
        data() {
            return {
                registerData: {
                    firstName: '',
                    middleName: '',
                    lastName: '',
                    email: '',
                    password: ''
                },
                errors: null,
                isAdding: false
            }
        },

        methods: {

            async register() {
                await axios.get('/sanctum/csrf-cookie')
                const res = await this.callApi('post', '/api/business/register/create', this.registerData)
                this.isAdding = true
                if (res.status === 200 || res.status === 201) {
                    this.s('Successfully Register a Business')
                    window.location = '/business/login'
                } else {
                    if (res.status === 422) {
                        this.errors = res.data.errors
                    }
                    this.swr()
                }
                this.isAdding = false
            },

            errorFor(field) {
                return this.hasErrors && this.errors[field] ? this.errors[field] : null
            }
        },
        computed: {
            hasErrors() {
                return 422 === this.status || this.errors !== null
            },
            hasUsersy() {
                return 200 === this.status
            },

            noUsers() {
                return 404 === this.status;
            }
        },


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
