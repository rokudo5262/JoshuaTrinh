@extends('layout.app')

@section('title', 'Create User')

@section('content')
    @if ($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif
    <div class="alert alert-success" style="display:none"></div>
    <div class="content">
        <h2>Add New User</h2>
        <form id="create_new_user">
            @csrf
            <div class="form-group">
                <div class="form-input">
                    <label>Profile Picture :</label>
                    <input type="file" name="profile_picture"/>
                </div>
                <div class="form-input">
                    <label>First Name :</label>
                    <input type="text" name="first_name"/>
                </div>
                <div class="form-input">
                    <label>Last Name :</label>
                    <input type="text" name="last_name"/>
                </div>
                <div class="form-input">
                    <label>Email :</label>
                    <input type="text" name="email"/>
                </div>
                <div class="form-input">
                    <label>Password :</label>
                    <input type="password" name="password"/>
                </div>
            <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="content">
        <a type="button" href="{{ config('app.url')}}/user">BACK</a>
    </div>
<script>
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
</script>

@endsection