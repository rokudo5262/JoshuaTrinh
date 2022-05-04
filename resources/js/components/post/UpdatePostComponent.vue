<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post Update</h2>
        </div>
        <div class="card-body">
        <form>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="title" v-model="fields.title"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
                    <div class="col-md-6">
                        <textarea  class="form-control" name="content"  v-model="fields.content"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-md-4 col-form-label text-md-end" >Author</label>
                    <div class="col-md-6">
                        <input  class="form-control" name="author" v-model="fields.author">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="post_status" class="col-md-4 col-form-label text-md-end" >Status</label>
                    <div class="col-md-6">
                        <select class="form-select" name="post_status" v-model="fields.post_status">
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
        props: ['postid'],
        mounted() {
            console.log('Update Post Component mounted.')
        },
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
            this.get_post();
        },
        methods: {
            update_post() {
                axios.post('/admin/post/update/'+this.postid,this.fields)
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
            get_post() {
                axios.get("/api/post/"+ this.postid)
                .then( response => {
                    this.fields = response.data;
                    console.log("get post successfully");
                    return this.fields;
                })
                .catch(error => {
                    alert("Could not get post")
                    console.log(error);
                });
            },
        }
    }
</script>