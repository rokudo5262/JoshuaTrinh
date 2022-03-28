<!doctype html>
<html>
<head>
    <title>View User</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <script src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    <div class="content">
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/create">Create user</a>
        <!-- <a type="button" class="button button-primary" href="{{ config('app.url')}}/under_construction">multiple delete</a> -->
    </div>
    <div class="content">
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
                        <tr>
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
    <div class="content">
        <h2>Deleted Users List</h2>
        @if (count($all_deleted_users) == 0)
            <p>No data to display</p>
        @else
            <table class="table">
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
    </div>
    @include('footer')
</body>
</html>