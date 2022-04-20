<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Update</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="update_user">
                    {{ user.first_name }}
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="first_name" :v-model="fields.first_name"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="last_name" :v-model="fields.last_name"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email" :v-model="fields.email"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">Date Of Birth</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email" :v-model="fields.date_of_birth"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="address" :v-model="fields.address"/>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
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
        props: ['user'],
        mounted() {
            console.log('Update User Component mounted.')
            axios.get("../show/"+ this.user.id)
                .then(function (response) {
                    this.fields = response.data;
                })
                .catch(function () {
                    alert("Could not get user")
                });
        },
        data: function() {
            return {
                user_id: null,
                fields:{
                    first_name:'',
                    last_name:'', 
                    email:'', 
                    date_of_birth:'', 
                    adress:'', 
                },
                success: false,
                errors: {},
            }
        },
        methods:{
            update_user() {
                axios.post('./user/update/',this.user.id)
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
            onchange() {
                console.log(this.fields);
            }
        }

    }
</script>