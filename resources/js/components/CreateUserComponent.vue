<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Create User</h2>
                    </div>
                    <div class="card-body">
                        <form id="create_new_user">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <label class="form-label">Profile Picture :</label>
                                    <input class="form-control" type="file" name="profile_picture"/>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label">First Name :</label>
                                    <input class="form-control" type="text" name="first_name"/>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label">Last Name :</label>
                                    <input class="form-control" type="text" name="last_name"/>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label">Email :</label>
                                    <input class="form-control" type="text" name="email"/>
                                </div>
                                <div class="row mb-3">
                                    <label class="form-label">Password :</label>
                                    <input class="form-control" type="password" name="password"/>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
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
            console.log('Count Component mounted.')
        }
    }
</script>