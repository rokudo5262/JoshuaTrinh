<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Dashboard</h2>                        
            </div>
            <div class="card-body">
                <p>You are logged in!</p>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Dashboard Component mounted.')
        },
    }
</script>