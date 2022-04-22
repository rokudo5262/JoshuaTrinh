<template>
    <div class="" align="center">
        <h2>Total Post</h2>
        {{ count }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count Post Component mounted.')
        },
        data: function() {
            return {
                count: null,
            }
        },
        created() {
            this.count_post();
        },
        methods: {
            count_post() {
                axios.get('/api/post/count')
                .then( response => {
                    this.count = response.data;
                    console.log('success');
                }).catch( error => {
                    console.log('error');
                })
            },
        }
    }
</script>