<template>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 mx-auto">
            <div class="card mb-4 mx-auto" style="width: 28rem;">
                <div class="card-body">
                    <h5 class="text-center text-uppercase text-secondary">
                        My Account
                    </h5>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" disabled :value="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-group">

                            <input
                                :type="showPassword"
                                class="form-control"
                                v-model="account.password"
                                :class="[{'is-invalid':this.errorFor('password')}]"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-primary" @click="showVisibility">
                                    <i v-if="showPassword === 'password'" class="fa fa-eye"></i>
                                    <i v-if="showPassword === 'text'" class="fa fa-eye-slash"></i>
                                </button>
                            </div>

                            <div
                                class="invalid-feedback"
                                v-for="(error,i) in this.errorFor('password')" :key="'Password' + i">
                                {{error}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" v-model="account.password_confirmation"/>
                    </div>

                    <button class="btn btn-primary btn-block" @click="changePassword">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Account",
    data: () => ({
        account: {
            password: null,
            password_confirmation: null,
        },
        email: null,
        showPassword: 'password',
        errors: null,

    }),
    methods: {
        showVisibility() {
            this.showPassword = this.showPassword === 'password' ? 'text' : 'password'
        },
        async changePassword() {
            const res = await this.callApi('post', '/api/change-password', this.account)
            if (res.status === 200) {
                this.account.password = ''
                this.account.password_confirmation = ''
                this.s('Successfully Updated the Password')
                window.location = '/qrcode'
            } else {
                if (res.status === 422) {
                    this.errors = res.data.errors
                }
                this.swr()
            }
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
    async created() {
        const res = await this.callApi('get', '/api/account')
        if (res.status === 200) {
            this.email = res.data.data.email
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

.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}
</style>
