<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post List</h2>
        </div>
        <div class="card-body">
                <form @submit.prevent="delete_multiple_post">
                    <a type="button" class="btn btn-primary mb-3" href="./post/create">Create New Post</a>
                    <button type="submit" class="btn btn-primary mb-3" :disabled="this.ids.length < 1">Delete Multiple Posts</button>
                </form>
                <div class="alert alert-success" v-if="success.delete_multiple_post">Delete Multiple Posts Successfully</div>
                <div class="alert alert-success" v-if="success.delete_post">Delete Post Successfully</div>
            <table class="table post-table table-hover table-sm">
                <thead>
                    <td></td>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Slug</td>
                    <td>Author</td>
                    <td>Total Comment</td>
                    <td>Post Status</td>
                    <td>Created At</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <tr v-for = "post in $store.state.posts" :key="post.id" >
                        <td><input type="checkbox"  v-model="ids" :value="post.id"></td>
                        <td>{{ post.id }}</td>
                        <td>{{ post.title }}</td>
                        <td>{{ post.slug }}</td>
                        <td>
                            <a :href="'./user/show/' + post.user_id">{{ post.author}}</a>
                        </td>
                        <td>{{ post.comment_count }}</td>
                        <td>{{ post.post_status }}</td>
                        <td>{{ post.created_at }}</td>
                        <td>
                            <a type="button" class="btn btn-sm btn-primary" :href="'./post/show/' + post.id">Detail</a>
                            <a type="button" class="btn btn-sm btn-success" :href="'./post/edit/' + post.id">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" @click.prevent="delete_post(post.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a type="button" href="/admin">Dashboard</a>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data: function() {
            return {
                ids: [],
                posts: [],
                success: {
                    delete_multiple_post: false,
                    delete_post: false,
                },
                errors: {},
            }
        },

        created() {
            this.$store.dispatch('get_posts');
        },

        methods: {
            delete_multiple_post() {
                if(confirm("Do you really want to delete multiple posts ?")) {
                    axios.post('post/mutiple_delete',this.ids)
                    .then( response => {
                        this.get_posts();
                        this.ids = [];
                        this.success.delete_multiple_post = true;
                        this.success.delete_post = false;
                        this.errors = {};
                    }).catch( error => {
                        alert("Could not delete multiple posts");
                    })
                }
            },
            delete_post(id) {
                if(confirm("Do you really want to delete this post ?")) {
                    this.$store.dispatch('delete_post',id)
                    .then( response => {
                        this.success.delete_post = true;
                    })
                    .catch(error => {
                        alert("Could not delete this post");
                    });
                }
            },
        }
    }
</script>