<template>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post List</h2>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary mb-3" href="">Create New Post</a>
            <table class="table">
                <thead>
                    <td></td>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Slug</td>
                    <td>Author</td>
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
                            <a href="">{{ post.user.first_name }} {{ post.user.last_name }}</a>
                        </td>
                        <td>{{ post.status }}</td>
                        <td>{{ post.created_at }}</td>
                        <td>
                            <a type="button" :href="test">Detail</a>
                            <a type="button" href="">Edit</a>
                            <a type="button" href="">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a type="button" href="#">BACK</a>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['posts'],
        mounted() {
            console.log('Post Component mounted.')
        },
    }
</script>