
@extends('layout.app')

@section('title', 'Search User')

@section('content')
    <div class="content">
    <div class="alert alert-success" style="display:none"></div>
        <form >
            <input type="text" id="search" name="search" placeholder="Search.." />
            <!-- <button type="submit">Submit</button> -->
        </form>
        <form id="solf_delete_multiple_user">
            @csrf
            <input type="text" id="ids" value="">
            <button type="summit" class="button button-primary" name="multiple_delete">Multiple Delete</button>
        </form>
    </div>
    <input type="checkbox" id="1" value="1"/>
    <div class="content">
            <table class="table">
                <caption>Users</caption>
                <thead>
                    <td></td>
                    <td>first name</td>
                    <td>last name</td>
                    <td>email</td>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="content">
            <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
    </div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("input[type='checkbox']").change(function(){
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
            url: "/user/mutiple_delete",
            enctype: 'multipart/form-data',
            data: {
                _token: "{{ csrf_token() }}",
                ids: jQuery('#ids').val(),
            },
            success: function(result){
                var test = jQuery('#ids').val().split(",");
                // test.each().jQuery('checkbox[id='test[i]').closect('tr').hide();
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);      
                },
            });
        });
        jQuery('#search').on('keyup',function(){
            $value = jQuery(this).val();
            jQuery.ajax({
                type : 'get',
                url : '/user/handle_search',
                data:{
                    'search' : $value,
                },
                success:function(data) {
                    jQuery('tbody').html(data);
                }
            });
        })
    });
</script>
@endsection