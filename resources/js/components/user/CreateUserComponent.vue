<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Create New User</h2>
            </div>
            <div class="card-body">
                <div class="alert alert-success" v-show="success">Add New User Successfully</div>
                <form @submit.prevent="add_new_user">
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" v-model="fields.first_name" name="first_name"/>
                            <div class="alert alert-danger" v-if="errors && errors.first_name">{{errors.first_name[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" v-model="fields.last_name" name="last_name"/>
                            <div class="alert alert-danger" v-if="errors && errors.last_name">{{errors.last_name[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" v-model="fields.email" name="email"/>
                            <div class="alert alert-danger" v-if="errors && errors.email">{{errors.email[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" v-model="fields.password" name="password"/>
                            <div class="alert alert-danger" v-if="errors && errors.password">{{errors.password[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a type="button" href="">BACK</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Create User Component mounted.')
        },
        data: function() {
            return {
                fields: {},
                success: false,
                errors: {},
            }
        },
        methods:{
            add_new_user() {
                axios.post('store',this.fields)
                .then( response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                    console.log('Success');
                }).catch( error => {
                    if(error.response.status == 422)
                    this.errors = error.response.data.errors;
                    console.log('Error');
                })
            },
        }
    }
</script>