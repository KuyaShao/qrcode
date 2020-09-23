<template>
    <div>
        <nav class="navbar navbar-expand-md bg-dark border-bottom navbar-dark">
            <a class="navbar-brand mr-auto" href="#">QrCode Tracker</a>
            <div v-if="this.$store.state.user">
                <a href="/logout" class="btn nav-button text-center white" >
                    Log out
                </a>
            </div>
            <div v-else>
                <router-link class="btn nav-button text-center  white" :to="{name:'login'}">Client</router-link>
                <router-link class="btn nav-button text-center  white" :to="{name:'login-business'}">Business</router-link>
            </div>
        </nav>
        <div class="container mt-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App",
        props:['user'],
        data: () => ({
            isLogin: false
        }),
        created() {
            this.$store.dispatch('userObj', this.user)
        }
    }
</script>

<style scoped>
    .white{
        color: white;
        font-weight: bold;
    }
</style>
