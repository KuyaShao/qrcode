export default {
    methods: {
        async callApi(methods,url,dataObj){
            try{
                return await axios({
                    method: methods,
                    url: url,
                    data: dataObj,
                })
            }catch(e) {
                return e.response
            }
        },

        s(desc, title="Great!") {
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        w(desc, title="Oops!") {
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        e(desc, title="Oops!") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        swr(desc='Something went wrong! Please try again.', title="Oops") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },

    }
}
