<template>
    <div align="center">
        <h2>Total User</h2>
        {{ $store.state.count_user }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Count User Component mounted.')
            
        },
        created() {
            this.$store.dispatch('count_user')
        },
    }
</script>