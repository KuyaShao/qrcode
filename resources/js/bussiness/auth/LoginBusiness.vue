<template>
    <div class="row ">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div class="card mx-auto" style="width: 24rem">
                <div class="card-body">
                    <h5 class="card-title text-center text-muted text-uppercase">
                        Business Login
                    </h5>
                    <div class="form-group">
                        <label for="email" class="text-muted">Email Address</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="loginData.email"
                            placeholder="Email Address"
                            @keyup.enter="login"
                            :class="[{'is-invalid':this.errorFor('email')}]">
                        <div class="invalid-feedback" v-for="(error,i) in this.errorFor('email')" :key="'Email' + i">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-muted">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            v-model="loginData.password"
                            placeholder="Password"
                            @keyup.enter="login"
                            :class="[{'is-invalid':this.errorFor('password')}]">

                        <div class="invalid-feedback" v-for="(error,i) in this.errorFor('password')"
                             :key="'Password' + i">
                            {{error}}
                        </div>
                    </div>
                    <button
                        class="btn btn-primary btn-block"
                        @click="login" :disabled="isLoading"
                        :loading="isLoading">Login</button>
                    <div class="text-center mt-3">
                        <router-link :to="{name:'reset-password'}">
                            Forgot Password
                        </router-link>
                    </div>
                </div>
            </div>

            <div class="card mt-3 pt-3 mx-auto" style="width: 24rem">
                <div class="card-body text-center">
                    <p class="text-muted">
                        Dont have an account?
                        <router-link :to="{name:'register-business'}">
                            Register
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",

        data() {
            return {
                loginData: {
                    email: '',
                    password: ''
                },
                errors: null,
                isLoading: false
            }
        },

        methods: {
            async login(){
                this.isLoading = true
                await axios.get('/sanctum/csrf-cookie')
                const res = await this.callApi('post','/api/business/login/log',this.loginData)
                if(res.status === 200){
                    this.s('Login Successfully')
                    window.location = '/profile'
                }else{
                    if(res.status === 422){
                        this.errors = res.data.errors
                    }
                    if(res.status === 401){
                        this.e(res.data.msg)
                    }

                    this.swr()
                }
                this.isLoading = false

            },

            errorFor(field) {
                return this.hasErrors && this.errors[field] ? this.errors[field] : null
            }
        },
        computed: {
            hasErrors() {
                return 422 === this.status || this.errors !== null
            },
            hasUsers() {
                return 200 === this.status
            },

            noUsers() {
                return 404 === this.status;
            }
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
    .is-invalid{
        border-color:#b22222;
        background-image:none;
    }
    .invalid-feedback{
        color:#b22222;
    }
</style>
