import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        user:false
    },
    mutations:{
        setUserObj(state,data){
            state.user = data;
        },
    },
    actions:{
        userObj({commit},data){
            this.commit('setUserObj',data)
        }
    }
})
