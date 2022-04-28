<template>
    <div align="center">
        <h2>Total Comment</h2>
        {{ $store.state.count_comment }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count Comment Component mounted.');
        },
        created() {
            this.$store.dispatch('count_comment');
        },
    }
</script>