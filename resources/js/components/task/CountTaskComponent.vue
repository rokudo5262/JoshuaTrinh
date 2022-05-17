<template>
    <div align="center">
        <h2>Total Task</h2>
        {{ $store.state.count_task }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count Task Component mounted.');
        },
        created() {
            this.$store.dispatch('count_task');
        },
    }
</script>