import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vue, axios)

export default new Vuex.Store({
    state: {
        counter: 0,
        color_code: 'black',
        count_user: 0,
        count_post: 0,
        count_comment: 0,
    },
    //commit
    mutations: {
        increase_counter (state,number) {
            state.counter+= number;
        },
        decrease_counter (state,number) {
            state.counter-= number;
        },
        set_color_code(state,new_color){
            state.color_code = new_color;
        },
        count_user(state,new_value) {
            state.count_user += new_value;
        },
        count_post(state,new_value) {
            state.count_post = new_value;
        },
        count_comment(state,new_value) {
            state.count_comment = new_value;
        }
    },
    //dispatch
    actions: {
        increase_counter ({ commit }) {
            commit('increase_counter',1);
        },
        decrease_counter ({ commit }) {
            commit('decrease_counter',1);
        },
        set_color_code({ commit },new_color) {
            commit('set_color_code',new_color)
        },
        count_user({ commit }) {
            axios.get('/api/user/count').then(response => {
                commit('count_user',response.data)
            }).error(error => {
                console.log('could not get count user')
            })
        },
        count_post({ commit }) {
            // axios.get('/api/post/count')
            // .then(response => {
            //     commit('count_post',response.data);
            // }).error(error => {
            //     console.log('could not get count post');
            // })
        },
        count_comment({ commit }) {
            // axios.get('/api/comment/count')
            // .then(response => {
            //     commit('count_comment',response.data);
            // }).error(error => {
            //     console.log('could not get count comment');
            // })
        },
    },
    getters: {
        counter_squared(state) {
            return state.counter*state.counter;
        },
    }
});

