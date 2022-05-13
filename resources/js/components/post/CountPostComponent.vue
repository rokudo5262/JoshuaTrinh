<template>
    <div align="center">
        <h2>Total Post</h2>
        {{ $store.state.count_post }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count Post Component mounted.');
        },
        created() {
            this.$store.dispatch('count_post');
        },
    }
</script>