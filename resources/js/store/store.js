import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        counter: 0,
        color_code: 'black',
        count_user: 0,
        count_post: 0,
        count_comment: 0,
        users: [],
        user: {},
        posts: [],
        post: {},
        success: false,
        errors: {},
        user_ids: [],
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
        
        count_user_mutation(state,new_value) {
            state.count_user += new_value;
        },

        count_post_mutation(state,new_value) {
            state.count_post = new_value;
        },

        count_comment_mutation(state,new_value) {
            state.count_comment = new_value;
        },

        get_users_mutation(state,new_value){
            state.users = new_value;
        },

        create_new_user_mutation(state,new_user) {
            state.users.push(new_user);
        },

        delete_user_mutation(state,id) { 
            state.users = state.users.filter((todo) => todo.id !== id)
        },

        get_posts_mutation(state,new_value){
            state.posts = new_value;
        },

        delete_post_mutation(state,id) { 
            state.posts = state.posts.filter((todo) => todo.id !== id)
        },
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
                commit('count_user_mutation', response.data);
            }).catch(error => {
                if(error.response.status == 422) {
                    commit('errors_mutation',error.response.data.errors)
                }
            });
        },

        count_post({ commit }) {
            axios.get('/api/post/count')
            .then(response => {
                commit('count_post_mutation', response.data);
            }).catch(error => {
                console.log('could not get count post');
            });
        },

        count_comment({ commit }) {
            axios.get('/api/comment/count')
            .then(response => {
                commit('count_comment_mutation', response.data);
            }).catch(error => {
                console.log('could not get count comment');
            });
        },

        get_users({ commit }) {
            axios.get('/api/user')
            .then( response => {
                commit('get_users_mutation', response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },

        create_new_user({ commit },user) {
            axios.post('/admin/user/store',user)
            .then( response => {
                commit('create_new_user_mutation',user);
            }).catch();
        },

        delete_user({ commit }, id) {
            axios.post('/admin/user/delete/'+ id);
            commit('delete_user_mutation', id);
        },

        get_posts({ commit }) {
            axios.get('/api/post')
            .then( response => {
                commit('get_posts_mutation', response.data);
            })
            .catch(error => {
                alert("Could not load posts list");
            });
        },

        delete_post({ commit }, id) {
            axios.post('/admin/post/delete/'+ id);
            commit('delete_post_mutation', id);
        },
    },
    getters: {
        counter_squared(state) {
            return state.counter*state.counter;
        },

    }
});
export default store;

