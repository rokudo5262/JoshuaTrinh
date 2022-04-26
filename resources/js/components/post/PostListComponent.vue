<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post List</h2>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary mb-3" href="/admin/post/create">Create New Post</a>
            <table class="table">
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
                    <tr v-for = "post in posts" :key="post.id" >
                        <td><input type="checkbox" :id="post.id" :value="post.id"></td>
                        <td>{{ post.id }}</td>
                        <td>{{ post.title }}</td>
                        <td>{{ post.slug }}</td>
                        <td>
                            <a :href="'./user/show/' + post.user.id">{{ post.user.full_name}}</a>
                        </td>
                        <td>{{ post.comment_count }}</td>
                        <td>{{ post.status }}</td>
                        <td>{{ post.created_at }}</td>
                        <td>
                            <a type="button" class="btn btn-sm btn-primary" :href="'./post/show/' + post.id">Detail</a>
                            <a type="button" class="btn btn-sm btn-success" :href="'./post/edit/' + post.id">Edit</a>
                            <a type="button" class="btn btn-sm btn-danger" href="">Delete</a>
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
                posts: [],
                success: false,
                errors: {},
            }
        },
        mounted() {
            console.log('Post Component mounted.')
        },
        created() {
            this.get_posts();
        },
        methods: {
            get_posts() {
                axios.get('/api/post')
                .then( response => {
                    this.posts = response.data;
                })
                .catch(error => {
                    alert("Could not load posts list");
                });
            },
        }
    }
    
</script>