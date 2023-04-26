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
        count_task: 0,
        users: [],
        user: {},
        posts: [],
        post: {},
        roles: [],
        role: {},
        user_ids: [],
        search_user: null,
        errors:{},
    },
    //commit
    mutations: {
        increase_counter (state,number) {
            state.counter += number;
        },

        decrease_counter (state,number) {
            state.counter -= number;
        },

        set_color_code(state,new_color){
            state.color_code = new_color;
        },
        
        count_user_mutation(state,new_value) {
            state.count_user += new_value;
        },

        count_post_mutation(state,new_value) {
            state.count_post += new_value;
        },

        count_comment_mutation(state,new_value) {
            state.count_comment += new_value;
        },

        count_task_mutation(state,new_value) {
            state.count_task += new_value;
        },

        errors_mutation(state,new_errors) {
            state.errors = new_errors;
        },

        get_users_mutation(state,new_value) {
            state.users = new_value;
        },

        get_user_mutation(state,new_value) {
            state.user = new_value;
        },

        set_search_user_mutation(state,new_value) {
            state.search_user = new_value;
        },

        create_new_user_mutation(state,new_user) {
            state.users.push(new_user);
        },

        delete_user_mutation(state,id) { 
            state.users = state.users.filter((todo) => todo.id !== id)
        },

        set_selected_user_ids_mutation(state,id) {
            state.user_ids = id;
        },

        delete_multiple_user_mutation(state,ids) {
            state.user_ids;
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
            axios.get('/api/user/count')
            .then(response => {
                commit('count_user_mutation', response.data);
            }).catch(error => {
                console.log('could not get count user');
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

        count_task({ commit }) {
            axios.get('/api/task/count')
            .then(response => {
                commit('count_task_mutation', response.data);
            }).catch(error => {
                console.log('could not get count task');
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
        get_user({ commit },id) {
            axios.get('/api/user/'+id)
            .then( response => {
                commit('get_user_mutation', response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },

        create_new_user({ commit },user) {
            axios.post('/admin/user/store',user)
            .then( response => {
                commit('create_new_user_mutation',user);
            }).catch(error => {
                console.log(error)
            });
        },

        delete_user({ commit }, id) {
            axios.post('/admin/user/delete/'+ id);
            commit('delete_user_mutation', id);
        },

        delete_multiple_user({ commit}, ids) {
            axios.post('/admin/user/mutiple_delete', ids);
            commit('delete_multiple_user_mutation', ids);
        },

        //post
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

        user_ids_length(state) {
            return state.user_ids.length;
        },

        get_user_by_id: (state) => (id) => {
            return state.users.find( user => user.id === id);
        },

        search_user(state) {
            if (state.search_user) {
                return state.users
                    .filter(user => {
                        return state.search_user.toLowerCase().split(" ").every( v => user.email.toLowerCase().includes(v))
                            ||state.search_user.toLowerCase().split(" ").every( v => user.full_name.toLowerCase().includes(v));
                    });
            } else {
                return state.users;
            }
        },
    }
});
export default store;

