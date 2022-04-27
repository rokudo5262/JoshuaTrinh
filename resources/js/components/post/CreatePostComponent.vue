<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create New Post</h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="create_new_post">
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="title"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
                    <div class="col-md-6">
                        <textarea  class="form-control" name="content"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-md-4 col-form-label text-md-end">Author</label>
                    <div class="col-md-6">
                        <input  class="form-control" name="author">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                    <div class="col-md-6">
                        <select class="form-select" name="status">
                            <option value="0">Published</option>
                            <option value="1">Draft</option>
                            <option value="2">Pending</option>
                            <option value="3">Private</option>
                            <option value="4">Trash</option>
                        </select>
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
            <a type="button" href="/admin/post">BACK</a>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Create Post Component mounted.')
        },
        data: function() {
            return {
                fields:{},
                success: false,
                errors:{},
            }
        },
        methods: {
            create_new_post() {
                axios.post('/api/post/store',this.fields)
                .then( response => {
                    this.fields = {};
                    success = true;
                    errors = {}
                    console.log('success');
                }).catch( error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log('error');
                })
            }
        },
    }
</script>