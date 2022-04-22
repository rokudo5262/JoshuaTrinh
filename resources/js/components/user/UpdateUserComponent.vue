<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Update</h2>
            </div>
            <div class="card-body">
                <div class="alert alert-success" v-show="success">Update User Successfully</div>
                <form @submit.prevent="update_user">
                    <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">Profile Picture</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="profile_picture" v-on="fields.profile_picture"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">User ID</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="id" v-model="fields.id" readonly/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="first_name"  v-model="fields.first_name"/>
                            <div class="alert alert-danger" v-if="errors && errors.first_name">{{errors.first_name[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="last_name" v-model="fields.last_name"/>
                            <div class="alert alert-danger" v-if="errors && errors.last_name">{{errors.last_name[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email" v-model="fields.email"/>
                            <div class="alert alert-danger" v-if="errors && errors.email">{{errors.email[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="address" v-model="fields.address"/>
                            <div class="alert alert-danger" v-if="errors && errors.address">{{errors.address[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">Date Of Birth</label>
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="date_of_birth" v-model="fields.date_of_birth"/>
                            <div class="alert alert-danger" v-if="errors && errors.date_of_birth">{{errors.date_of_birth[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="phone_number" v-model="fields.phone_number"/>
                            <div class="alert alert-danger" v-if="errors && errors.phone_number">{{errors.phone_number[0]}}</div>
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
                <a type="button" href="/admin/user">BACK</a>
            </div>
        </div>
    </div> 
</template>

<script>
    export default {
        props: ['user'],
        data: function() {
            return {
                fields:{},
                success: false,
                errors: {},
            }
        },
        mounted() {
            console.log('Update User Component mounted.')
        },
        created(){
            this.get_user();
        },
        methods:{
            update_user() {
                axios.post('/admin/user/update/'+this.user.id,this.fields)
                .then( response => {
                    this.success = true;
                    this.errors = {};
                    console.log(this.fields.profile_picture);
                }).catch( error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log(error);
                    }
                })        
            },
            get_user() {
                axios.get("/api/user/"+ this.user.id)
                .then( response => {
                    this.fields = response.data;
                    console.log("get user success");
                    return this.fields;
                })
                .catch(error => {
                    alert("Could not get user")
                    console.log(error);
                });
            }
        }

    }
</script>