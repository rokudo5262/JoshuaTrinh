<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
            </div>
            <div class="card-body">
                <a type="button" class="btn btn-primary" href="./user/create">Create User</a>
                <table class="table">
                    <thead>
                        <td></td>
                        <td>Id</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>created at</td>
                        <td>Action</td>
                    </thead>
                    <tbody>
                        <tr v-for = "user in users" :key="user.id">
                            <td><input type="checkbox" id="" value=""></td>
                            <td>{{ user.id }}</td>
                            <td>{{ user.first_name }} {{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>
                                <a type="button" href="./detail">Detail</a>
                                <a type="button" href=".">Update</a>
                                <a type="button" href=".">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a type="button" href=".">BACK</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id','users'],
        mounted() {
            console.log('User Component mounted.')
            
        },
    }
</script>