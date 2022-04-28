<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
            </div>
            <div class="card-body">
                    <form @submit.prevent="delete_multiple_user">
                        <a type="button" class="btn btn-primary mb-3" href="./user/create">Create New User</a>
                        <button type="submit" class="btn btn-primary mb-3" :disabled="this.ids.length < 1">Delete Multiple Users</button>
                    </form>
                <div class="alert alert-success" v-if="success.delete_multiple_user">Delete Multiple Users Successfully</div>
                <div class="alert alert-success" v-if="success.delete_user">Delete User Successfully</div>
                    <input v-model="searchQuery">
                    <table class="table">
                        <thead>
                            <td></td>
                            <td>ID</td>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            <tr v-for = "user in search_user" :key="user.id">      
                                <td>
                                    <input type="checkbox" v-model="ids" :value="user.id">
                                </td>
                                <td>{{ user.id }}</td>
                                <td>{{ user.full_name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.created_at }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" type="button" :href="'./user/edit/' + user.id">Update</a>
                                    <button class="btn btn-sm btn-danger" @click.prevent="delete_user(user)" type="button">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="card-footer">
                <a type="button" href="/admin">Dashboard</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        mounted() {
            console.log('User Component mounted.')
        },
        data: function() {
            return {
                searchQuery: null,
                ids: [],
                users: [],
                success:{
                    delete_multiple_user: false,
                    delete_user: false,
                },
                errors: {},
            }
        },
        created() {
            this.get_users();
        },
        computed: {
            search_user() {
                if (this.searchQuery) {
                    return  this.users
                        .filter(user => {
                            return this.searchQuery.toLowerCase().split(" ").every( v => user.email.toLowerCase().includes(v))
                                ||this.searchQuery.toLowerCase().split(" ").every( v => user.full_name.toLowerCase().includes(v));
                        });
                } else {
                    return this.users;
                }
            }
        },
        methods: {
            delete_multiple_user() {
                if(confirm("Do you really want to delete multiple users ?")) {
                    axios.post('user/mutiple_delete',this.ids)
                    .then( response => {
                        this.get_users();
                        this.ids = [];
                        this.success.delete_multiple_user = true;
                        this.success.delete_user = false;
                        this.errors = {};
                    }).catch( error => {
                        alert("Could not delete multiple users");
                    })
                }
            },
            get_users() {
                axios.get('/api/user')
                .then( response => {
                    this.users = response.data;
                })
                .catch(error => {
                    alert("Could not load users list");
                });
            },
            delete_user(user) {
                if(confirm("Do you really want to delete this user ?")) {
                    axios.get('/api/user/delete' + user.id)
                    .then( response => {
                        const idx = this.users.indexOf(user);
                        this.users.splice(idx, 1);
                        this.success.delete_user = true;
                    })
                    .catch(error => {
                        alert("Could not delete this user");
                    });
                }
            },
        }
    }
</script>