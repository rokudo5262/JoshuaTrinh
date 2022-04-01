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
    <script type="text/javascript"  src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    <div class="content">
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/search">Search User</a>
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/create">Create User</a>
        <form id="solf_delete_multiple_user">
            @csrf
            <input type="hidden" id="ids" value="">
            <button type="summit" class="button button-primary">Multiple Delete</button>
        </form>
    </div>
    <div class="content">
        <form id="search" method="get" action="{{ config('app.url')}}/user">
            <input type="text" name="search" placeholder="Search.." />
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="content">
    <div class="alert alert-success" style="display:none"></div>
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
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @role('super_admin')
                                    <a type="button" href="{{ config('app.url') }}/user/show/{{ $user->id }}">detail</a>
                                    <a type="button" href="{{ config('app.url') }}/user/edit/{{ $user->id }}">edit</a>
                                    <a type="button" href="{{ config('app.url') }}/user/delete/{{ $user->id }}">delete</a>
                                @else 
                                    <p>No action allowed</p>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('footer')
</body>
</html>