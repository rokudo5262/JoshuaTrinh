<template>

</template>

<script>
    export default {
        props: ['posts'],
        mounted() {
            console.log('Update Post Component mounted.')
        },
        data: function() {
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
    }
</script>