<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="handle_change_password">
                    <div class="row mb-3">
                        <label for="current_password" class="col-md-4 col-form-label text-md-end">Current Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" v-model="fields.current_password" name="current_password"/>
                            <div class="alert alert-danger" v-if="errors && errors.current_password">{{errors.current_password[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="new_password" class="col-md-4 col-form-label text-md-end">New Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" v-model="fields.new_password" name="new_password"/>
                            <div class="alert alert-danger" v-if="errors && errors.new_password">{{errors.new_password[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">New Password Confirmation</label>
                    <div class="col-md-6">
                        <input class="form-control" type="password" v-model="fields.new_password_confirmation" name="new_password_confirmation"/>
                        <div class="alert alert-danger" v-if="errors && errors.new_password_confirmation">{{errors.new_password_confirmation[0]}}</div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <a type="button" href="admin/dashboard">dashboard</a>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Change Password Component mounted.')
        },
    
        data: function() {
            return {
                fields: {},
                success: false,
                errors: {},
            }
        },
        methods:{
            handle_change_password() {
                axios.post('/admin/handle_change_password',this.fields)
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
            }
        }
    }
</script>