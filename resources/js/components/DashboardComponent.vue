<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Dashboard</h2>                        
            </div>
            <div class="card-body">
                <p>You are logged in!</p>
                <div class="row">
                    <div class="col success alert alert-success">
                        <count-user-component></count-user-component>
                    </div>
                    <div class="col success alert alert-success">
                        <count-post-component></count-post-component>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</template>

<script>
    import CountPostComponent from './post/CountPostComponent'
    import CountUserComponent from './user/CountUserComponent'
    export default {
        mounted() {
            console.log('Dashboard Component mounted.')
        },
        components:{
            CountPostComponent,
            CountUserComponent,
        }
    }
</script>