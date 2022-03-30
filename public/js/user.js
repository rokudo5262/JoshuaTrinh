jQuery(document).ready(function(){
    jQuery('#create_new_user').submit(function(event){
        event.preventDefault();
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        method: 'POST',
        url: "store",
        enctype: 'multipart/form-data',
        data: {
            _token: "{{ csrf_token() }}",
            first_name: jQuery('input[name=first_name]').val(),
            last_name: jQuery('input[name=last_name]').val(),
            email: jQuery('input[name=email]').val(),
            password: jQuery('input[name=password]').val(),
        },
        success: function(result){
            jQuery('.alert').show();
            jQuery('.alert').html(result.success);
            $("#create_new_user")[0].reset();
        },
        error: function(result){
            jQuery('.alert').show();
            jQuery('.alert').html(result.error);
        }});
    });
});