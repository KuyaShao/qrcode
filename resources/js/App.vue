`<template>
    <div>
        <nav class="navbar navbar-expand-md pink border-bottom navbar-dark">
            <a class="navbar-brand" href="#">Mariveles QrTrace</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="ml-auto" v-if="this.$store.state.user && this.$store.state.profile">
                    <a href="/qrcode" class="btn nav-button text-center white" >Home</a>
                    <router-link class="btn nav-button text-center white" :to="{name:'diary'}">My Diary</router-link>
                    <router-link class="btn nav-button text-center white" :to="{name:'account'}">Settings</router-link>
                    <router-link class="btn nav-button text-center white" :to="{name:'policy'}">Privacy Policy</router-link>
                    <a href="/api/logout" class="btn nav-button text-center white">
                        Log out
                    </a>
                </div>
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
        props: ['user'],
        data: () => ({
            isLogin: false
        }),
        created() {
            this.$store.dispatch('userObj', this.user),
            this.$store.dispatch('profileObj',this.user.profiles.city)
        }
    }
</script>

<style scoped>
    .white {
        color: white;
        font-weight: bold;
    }

    .pink {
        background-color: #f56a79;
    }
    .white:hover{
        background-color: #9ab3f5;
    }
</style>
