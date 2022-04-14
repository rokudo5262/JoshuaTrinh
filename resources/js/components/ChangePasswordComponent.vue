<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="/handle_change_password">
                    <div class="row mb-3">
                        <input type="hidden" name="_token" :value="csrf">
                    </div>
                    <div class="row mb-3">
                        <label for="current_password" class="col-md-4 col-form-label text-md-end">Current Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="current_password"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="new_password" class="col-md-4 col-form-label text-md-end">New Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="new_password"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">New Password Confirmation</label>
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="new_password_confirmation"/>
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
            <a type="button" href=".">BACK</a>
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
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
    }
</script>