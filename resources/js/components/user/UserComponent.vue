<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
            </div>
            <div class="card-body">
                    <form @submit.prevent="delete_multiple_user">
                        <a type="button" class="btn btn-primary mb-3" href="./user/create">Create User</a>
                        <button type="submit" class="btn btn-primary mb-3">Delete Multiple Users</button>
                    </form>
                <div class="alert alert-success" v-show="success">Delete Multiple Users Successfully</div>
                <div class="alert alert-danger" v-if="errors && errors.ids">{{errors.ids[0]}}</div>

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
                        <tr v-for = "user in users" :key="user.id">
                            
                            <td>
                                <input type="checkbox" v-model="ids" :id="user.id" :value="user.id">
                            </td>
                            <td>{{ user.id }}</td>
                            <td>{{ user.first_name }} {{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" type="button" :href="'./user/show/' + user.id">Detail</a>
                                <a class="btn btn-sm btn-success" type="button" :href="'./user/edit/' + user.id">Update</a>
                                <form @submit.prevent="delete_user">
                                    <a class="btn btn-sm btn-danger" type="submit">Delete</a>
                                </form>
                            </td>
                            
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a type="button" href=".">BACK</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id','users'],
        mounted() {
            console.log('User Component mounted.')
            

        },
        data: function() {
            return {
                ids: [],
                success: false,
                errors: {},
            }
        },
        methods:{
            delete_multiple_user() {
                axios.post('user/mutiple_delete',this.ids)
                .then( response => {
                    this.ids = [];
                    this.success = true;
                    this.errors = {};
                    this.$emit("users");
                    console.log('Success');
                }).catch( error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log("error");
                    }
                })
            },
            get_users() {
                axios.post('user/index')
            }
        }
    }
</script>