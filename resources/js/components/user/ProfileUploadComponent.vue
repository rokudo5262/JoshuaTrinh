
<template>

</template>

<script>
    export default {
        props:['userid'],
        mounted() {
            console.log('Profile Upload Component mounted.');
        },
        data: function() {
            return {
                profile_picture: null,
            }
        },
        methods: {
            on_file_changed (event) {
                const profile_picture = event.target.files[0];
                console.log(profile_picture);
            },
            on_file_upload () {
                axios.post('/admin/user/profile_upload/1')
                .then( response => {
                    console.log(this.profile_picture.name);
                    console.log('Success');
                })
                .catch(error => {
                    console.log('error');
                });
            },
        }
    }
</script>