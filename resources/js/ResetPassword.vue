<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card card-default">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <form autocomplete="off" @submit.prevent="requestResetPassword" method="post">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" class="form-control" placeholder="user@example.com"
                                       v-model="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                            <router-link to="/" class="btn btn-secondary">Cancel</router-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            has_error: false
        }
    },
    methods: {
        async requestResetPassword() {
            const res = await this.callApi("post", "/api/reset-password", {email: this.email})
            if (res.status === 200) {
                this.response = res.data
                console.log(res.data)
            } else {
                console.error(res.data.errors);
            }
        }
    }
}
</script>
