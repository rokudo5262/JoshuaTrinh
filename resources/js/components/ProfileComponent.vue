<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Profile</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="full_name" class="col-md-4 col-form-label text-md-end">Full Name</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="full_name" readonly/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email" readonly/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="full_name" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="address" readonly/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="full_name" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="phone_number" readonly/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a type="button" href="/admin">dashboard</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Login User Profile Component mounted.')
        },
        data: function() {
            return {
            }
        },
    }
</script>