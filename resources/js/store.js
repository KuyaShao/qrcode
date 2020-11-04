import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        user:false,
        profile:false
    },
    mutations:{
        setUserObj(state,data){
            state.user = data;
            console.log(data)
        },
        setProfileObj(state,data){
            state.profile = data
            console.log(data)
        }
    }

    ,
    actions:{
        userObj({commit},data){
            this.commit('setUserObj',data)
        },
        profileObj({commit},data){
            this.commit('setProfileObj',data)
        }
    }
})
