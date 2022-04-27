<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" v-show="success">Register Successfully</div>
                    <form @submit.prevent="handle_register">
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-model="fields.first_name" name="first_name">
                                <div class="alert alert-danger" v-if="errors && errors.first_name">{{errors.first_name[0]}}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-model="fields.last_name" name="last_name">
                                <div class="alert alert-danger" v-if="errors && errors.last_name">{{errors.last_name[0]}}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" v-model="fields.email" name="email" autofocus>
                                <div class="alert alert-danger" v-if="errors && errors.email">{{errors.email[0]}}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" v-model="fields.password" name="password" >
                                <div class="alert alert-danger" v-if="errors && errors.password">{{errors.password[0]}}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Password Confirmation</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control " v-model="fields.password_confirmation" name="password_confirmation">
                                <div class="alert alert-danger" v-if="errors && errors.password_confirmation">{{errors.password_confirmation[0]}}</div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Register Component mounted.')
        },
        data: function() {
            return {
                fields:{},
                success: false,
                errors: {},
            }
        },
        methods:{
            handle_register() {
                axios.post('/admin/handle_register',this.fields)
                .then( response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                    console.log('success');
                }).catch( error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log('error');
                    }
                })
            },
        }
    }
</script>