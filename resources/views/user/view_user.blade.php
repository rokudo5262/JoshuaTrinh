<!doctype html>
<html>
<head>
    <title>View User</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <script src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    <div class="content">
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/search">Search User</a>
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/create">Create User</a>
        <form id="solf_delete_multiple_user">
            @csrf
            <input type="hidden" id="ids" value="">
            <button type="summit" class="button button-primary">multiple delete</button>
        </form>
    </div>
    <div class="content">
    <div class="alert alert-success" style="display:none"></div>
    <form>
        <h2>Users List</h2>
        @if (count($all_users) == 0)
            <p>No data to display</p>
        @else
            <table class="table">
                <caption>Users</caption>
                <thead>
                    <td></td>
                    <td>id</td>
                    <td>first name</td>
                    <td>last name</td>
                    <td>full name</td>
                    <td>email</td>
                    <td>created at</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($all_users as $user)
                        <tr id="{{ $user->id }}">
                            <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name}}</td>
                            <td>{{ $user->full_name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->created_at}}</td>
                            <td>
                                <a type="button" href="{{ config('app.url')}}/user/show/{{ $user->id }}">detail</a>
                                <a type="button" href="{{ config('app.url')}}/user/edit/{{ $user->id }}">edit</a>
                                <a type="button" href="{{ config('app.url')}}/user/delete/{{ $user->id }}">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <!-- <div class="content">
        <h2>Deleted Users List</h2>
        @if (count($all_deleted_users) == 0)
            <p>No data to display</p>
        @else
            <table class="table" id="user_table">
                <caption>deleted Users</caption>    
                <thead>
                    <td></td>
                    <td>id</td>
                    <td>first name</td>
                    <td>last name</td>
                    <td>full name</td>
                    <td>email</td>
                    <td>created_at</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($all_deleted_users as $user)
                        <tr>
                            <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a type="button" href="{{ config('app.url')}}/user/undo_delete/{{ $user->id }}">undo delete</a>
                                <a type="button" href="{{ config('app.url')}}/user/destroy/{{ $user->id }}">permanent delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div> -->
    @include('footer')
<script>
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
            // test.each().jQuery('checkbox[id='test[i]').closect('tr').hide();
            jQuery('.alert').show();
            jQuery('.alert').html(result.success);      
        },
    });
});
});

</script>
</body>
</html>