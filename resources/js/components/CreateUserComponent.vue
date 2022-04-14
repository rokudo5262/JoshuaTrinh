<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Create User</h2>
            </div>
            <div class="card-body">
                <form id="create_new_user" method="POST" action="store">
                    <div class="row mb-3">
                        <input type="hidden" name="_token" :value="csrf">
                    </div>
                    <div class="row mb-3">
                        <label for="profile_picture" class="col-md-4 col-form-label text-md-end">Profile Picture</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="profile_picture"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="first_name"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="last_name"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="password"/>
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
                <a type="button" href="/user">BACK</a>
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
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
    }
</script>