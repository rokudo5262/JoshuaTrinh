// jQuery(document).ready(function(){
//     jQuery('#create_new_user').submit(function(event){
//         event.preventDefault();
//        $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     jQuery.ajax({
//         method: 'POST',
//         url: "store",
//         enctype: 'multipart/form-data',
//         data: {
//             _token: "{{ csrf_token() }}",
//             first_name: jQuery('input[name=first_name]').val(),
//             last_name: jQuery('input[name=last_name]').val(),
//             email: jQuery('input[name=email]').val(),
//             password: jQuery('input[name=password]').val(),
//         },
//         success: function(result){
//             jQuery('.alert').show();
//             jQuery('.alert').html(result.success);
//             $("#create_new_user")[0].reset();
//         },
//         error: function(result){
//             jQuery('.alert').show();
//             jQuery('.alert').html(result.error);
//         }});
//     });
// });
jQuery(document).ready(function(){
    jQuery("input[type='checkbox']").click(function(){
            var val = [];
            jQuery(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
        });
        jQuery('#ids').val(val.join(','));
    });
    jQuery('#solf_delete_multiple_user').submit(function(event){
        event.preventDefault();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        method: 'POST',
        url: "user/mutiple_delete",
        enctype: 'multipart/form-data',
        data: {
            _token: "{{ csrf_token() }}",
            ids: jQuery('#ids').val(),
        },
        success: function(result){
            var test = jQuery('#ids').val().split(",");
            console.log(test);
            // test.each().jQuery('checkbox[id='test[i]').closect('tr').hide();
            jQuery('.alert').show();
            jQuery('.alert').html(result.success);      
            },
        });
    });
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