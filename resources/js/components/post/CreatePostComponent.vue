<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create New Post</h2>
        </div>
        <div class="card-body">
            <div class="alert alert-success" v-show="success">Create New Post Successfully</div>
            <form @submit.prevent="create_new_post">
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="title" v-model="fields.title">
                        <div class="alert alert-danger" v-if="errors && errors.title">{{errors.title[0]}}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
                    <div class="col-md-6">
                        <textarea  class="form-control" name="content" v-model="fields.content"></textarea>
                        <div class="alert alert-danger" v-if="errors && errors.content">{{errors.content[0]}}</div>
                    </div>
                </div>
                <div class="row mb-3">
                
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-md-4 col-form-label text-md-end">Author</label>
                    <div class="col-md-6">
                        <select class="form-select" name="author" v-model="fields.author">
                              <option v-for="author in authors " :key="author.id" :value="author.id">{{ author.full_name }}</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.author">{{errors.author[0]}}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                    <div class="col-md-6">
                        <select class="form-select" name="post_status" v-model="fields.post_status">
                            <option value="0">Published</option>
                            <option value="1">Draft</option>
                            <option value="2">Pending</option>
                            <option value="3">Private</option>
                            <option value="4">Trash</option>
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.post_status">{{errors.post_status[0]}}</div>
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
                authors:{},
                fields:{},
                success: false,
                errors:{},
            }
        },
        created() {
            this.get_authors();
        },
        methods: {
            create_new_post() {
                axios.post('/admin/post/store',this.fields)
                .then( response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                    console.log('Success');
                }).catch( error => {
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log('Error');
                    }
                })
            },
            get_authors() {
                axios.get('/api/user')
                .then( response => {
                    this.authors = response.data;
                })
                .catch(error => {
                    alert("Could not load author list");
                });
            },
        }
    }
</script>