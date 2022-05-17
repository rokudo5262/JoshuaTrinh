<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
            </div>
            <div class="card-body">
                    <form @submit.prevent="delete_multiple_user">
                        <a type="button" class="create-new-user-btn btn btn-primary mb-3" href="./user/create">Create New User</a>
                        <button type="submit" class="delete-multiple-user-btn btn btn-primary mb-3" 
                        :disabled="$store.getters.user_ids_length < 1">Delete Multiple Users</button>
                    </form>
                <div class="alert alert-success" v-if="success.delete_multiple_user">Delete Multiple Users Successfully</div>
                <div class="alert alert-success" v-if="success.delete_user">Delete User Successfully</div>
                    <input v-model="search_user" class="search-user-bar">
                    <table class="table user-table table-hover table-sm">
                        <thead>
                            <td></td>
                            <td>ID</td>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>First Post</td>
                            <td>Post Count</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            <tr v-for = "user in $store.getters.search_user" :key="user.id">      
                                <td>
                                    <input type="checkbox" v-model="selected_user_ids" :value="user.id">
                                </td>
                                <td>{{ user.id }}</td>
                                <td>{{ user.full_name }}</td>
                                <td>{{ user.email }}</td>
                                <td >
                                    <a v-if="user.first_post!==null" :href="'/admin/post/show/'+user.first_post.id">{{ user.first_post.title }}</a>
                                    <a v-else>None</a>
                                </td>
                                <td>{{ user.posts_count }}</td>
                                <td>{{ user.created_at }}</td>
                                <td>
                                    <a type="button" class="detail-user-btn btn btn-sm btn-primary" @click="click_show(user.id)">Detail</a>
                                    <a type="button" class="edit-user-btn btn btn-sm btn-success"  @click="click_edit(user.id)">Edit</a>
                                    <button class="btn btn-sm btn-danger" @click.prevent="delete_user(user.id)" type="button">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="card-footer">
                <a type="button" class="back-btn" href="/admin">Dashboard</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                success: {
                    delete_multiple_user: false,
                    delete_user: false,
                },
            }
        },

        created() {
            this.$store.dispatch('get_users');
        },

        computed: {
            search_user: {
                get: function() {
                    return this.$store.state.search_user;
                },

                set: function(value) {
                    this.$store.commit('set_search_user_mutation', value);
                }
            },

            selected_user_ids: {
                get: function() {
                    return this.$store.state.user_ids;
                },

                set: function(value) {
                    this.$store.commit('set_selected_user_ids_mutation', value);
                }
            },
        },

        methods: {
            delete_multiple_user() {
                if(confirm("Do you really want to delete multiple users ?")) {
                    this.$store.dispatch('delete_multiple_user',this.selected_user_ids)
                    .then( response => {
                        this.$store.dispatch('get_users');
                        this.success.delete_multiple_user = true;
                        this.success.delete_user = false;
                    }).catch( error => {
                        alert(error)
                    })
                }
            },

            delete_user(id) {
                if(confirm("Do you really want to delete this user ?")) {
                    this.$store.dispatch('delete_user',id)
                    .then( response => {
                        this.success.delete_multiple_user = false;
                        this.success.delete_user = true;
                    })
                    .catch(error => {
                        alert("Could not delete this user");
                    });
                }
            },

            click_edit(id){
                window.location.href = "./user/edit/"+ id;
                this.$store.dispatch('get_user',id);
            },
            click_show(id){
                window.location.href = "./user/show/"+ id;
            },
        }
    }
</script>