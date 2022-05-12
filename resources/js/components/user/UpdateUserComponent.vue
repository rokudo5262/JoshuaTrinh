<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Update</h2>
            </div>
            <div class="card-body">
                <div class="alert alert-success" v-if="success.upload">Upload Profile Picture Successfully</div> 
                <form @submit.prevent="on_file_upload">
                    <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">Profile Picture</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" accept="image/*" @change="on_file_changed">
                            <div class="alert alert-danger" v-if="errors && errors.profile_picture">{{errors.profile_picture[0]}}</div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="alert alert-success" v-if="success.update">Update User Successfully</div>
                <form @submit.prevent="update_user">
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
                            {{ $store.state.user }} fdfdf
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
                success: {
                    update: false,
                    upload: false,
                    },
                errors: {},
                profile_picture: null,
            }
        },
        created() {
            this.get_user();
        },
        computed: {
            // fields() {
            //     return this.$store.getters.get_user(this.user_id);
            // }
        },
        methods: {
            update_user() {
                axios.post('/admin/user/update/'+ this.user.id,this.fields)
                .then( response => {
                    this.success.update = true;
                    this.errors = {};
                    console.log("Success");
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
                    console.log('success');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            on_file_changed (event) {
                this.profile_picture = event.target.files[0];
            },
            on_file_upload (event) {
                const form_data = new FormData();
                form_data.append('profile_picture',this.profile_picture,this.profile_picture.name);
                axios.post('/admin/user/profile_upload/'+this.user.id,form_data)
                .then( response => {
                    this.success.upload = true;
                    console.log('success');
                })
                .catch(error => {
                    console.log('error');
                });
            },
        }
    }
</script>