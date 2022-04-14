<template>
        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
            </div>
            <div class="card-body">
                <a type="button" class="button button-primary" href="user/create">Create User</a>
                <table class="table">
                    <thead>
                        <td>Id</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>created at</td>
                    </thead>
                    <tbody>
                        <tr v-for = "user in users" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.first_name }} {{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['user_id','users'],
        mounted() {
            console.log('Example Component mounted.')
            
        },
        data: function () {
            return {
                count: 0
            }
        },
    }
</script>