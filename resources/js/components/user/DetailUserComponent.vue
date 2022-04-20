<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Detail</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9 mb-3">
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label">Full Name</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="full_name" :value="user.first_name + ' ' + user.last_name" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="email" :value="user.email" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-md-4 col-form-label">Date Of Birth</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="date_of_birth" :value="user.date_of_birth" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label">Phone Number</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="phone_number" :value="user.phone_number" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label">Address</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address" :value="user.address" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <img style="width: 100%; height: 100%; object-fit: contain;" src="/image/image.jfif" class="profile_pic" alt="alt text"> 
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img src="/image/image.jfif" alt="post">
                            <div class="container">
                                <h3>
                                    <a href=""></a>
                                </h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a type="button" href="">BACK</a>
            </div>
        </div>
</template>

<script>
    export default {
        props:['user','posts'],
        mounted() {
            console.log('Detail User Component mounted.')
        },
    }
</script>

