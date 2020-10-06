<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <h1 class="text-center text-uppercase">My Diary</h1>
            <table class="table table-striped">
                <thead class="thead-primary text-center">
                <tr>
                    <th>Business Name</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr v-for="(diaries,i) in diary" :key="i">
                    <td>{{diaries.business_name}}</td>
                    <td>{{timeFormatter(diaries.time)}}</td>
                    <td>{{diaries.date}}</td>
                </tr>
                </tbody>
            </table>

            <Page :total="pageInfo.total"
                  :current="pageInfo.current_page"
                  :page-size="parseInt(pageInfo.per_page)"
                  @on-change="getLogo" v-if="pageInfo"
            />
        </div>

    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "Diary",
        data: () => ({
            diary: '',
            total:10,
            loading: false,
            pageInfo: null,
        }),
        methods: {
            timeFormatter(time) {
                return moment(time).format('hh:mm A');
            },
            async getLogo(page = 1){
                this.loading = true
                const res = await this.callApi('get', `/api/diaries?page=${page}&total=${this.total}`);
                if (res.status === 200) {
                    this.diary = res.data.data;
                    this.pageInfo = res.data
                }
                this.loading = false
            },
        },

        async created() {

                this.getLogo();

        }
    }
</script>

<style scoped>

</style>
