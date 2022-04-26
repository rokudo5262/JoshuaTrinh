<template>
    <div align="center">
        <h2>Total Comment</h2>
        {{ count }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count Comment Component mounted.')
        },
        data: function() {
            return {
                count: null,
            }
        },
        created() {
            this.count_user();
        },
        methods: {
            count_user() {
                axios.get('/api/comment/count')
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