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
                        <input class="form-control" type="text" name="profile_picture" readonly/>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a type="button" href=".">BACK</a>
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