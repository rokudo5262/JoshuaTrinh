<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Dashboard</h2>                        
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <count-user-component></count-user-component>
                    </div>
                    <div class="col-6">
                        <count-post-component></count-post-component>
                    </div>
                    <div class="col-6">
                        <count-comment-component></count-comment-component>
                    </div>
                    <div class="col-6">
                        <counter-component></counter-component>
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
    import CountCommentComponent from './comment/CountCommentComponent'
    import CounterComponent from './CounterComponent'
    export default {
        mounted() {
            console.log('Dashboard Component mounted.')
        },
        components:{
            CountPostComponent,
            CountUserComponent,
            CountCommentComponent,
            CounterComponent,
        }
    }
</script>