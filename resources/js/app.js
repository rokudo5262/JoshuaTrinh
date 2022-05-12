

window.axios = require('axios');
window.Vue = require('vue').default;

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import store from './store/store';



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('change-password-component', require('./components/ChangePasswordComponent.vue').default);
Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('forget-password-component', require('./components/ForgetPasswordComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);

//user
Vue.component('user-list-component', require('./components/user/UserListComponent.vue').default);
Vue.component('create-user-component', require('./components/user/CreateUserComponent.vue').default);
Vue.component('detail-user-component', require('./components/user/DetailUserComponent.vue').default);
Vue.component('update-user-component', require('./components/user/UpdateUserComponent.vue').default);
Vue.component('count-user-component', require('./components/user/CountUserComponent.vue').default);

//post
Vue.component('post-list-component', require('./components/post/PostListComponent.vue').default);
Vue.component('create-post-component', require('./components/post/CreatePostComponent.vue').default);
Vue.component('detail-post-component', require('./components/post/DetailPostComponent.vue').default);
Vue.component('update-post-component', require('./components/post/UpdatePostComponent.vue').default);
Vue.component('count-post-component', require('./components/post/CountPostComponent.vue').default);

//comment
Vue.component('count-comment-component', require('./components/comment/CountCommentComponent.vue').default);

//test
Vue.component('counter-component', require('./components/CounterComponent.vue').default);

// task kanban
Vue.component('kanban-board', require('./components/KanbanBoardComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store,
});


