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
        <a type="button" href="{{ config('app.url')}}/user/create">Create user</a>
        <a type="button" href="{{ config('app.url')}}/under_construction">multiple delete</a>
    </div>
    <div class="content">
        <h1>Users List</h1>
        <table class="table">
            <thead>
                <td></td>
                <td>id</td>
                <td>first name</td>
                <td>last name</td>
                <td>full name</td>
                <td>date of birth</td>
                <td>email</td>
                <td>password</td>
                <td>created at</td>
                <td>update at</td>
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
                        <td>{{ $user->date_of_birth}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->password}}</td>
                        <td>{{ $user->created_at}}</td>
                        <td>{{ $user->update_at}}</td>
                        <td>
                            <a type="button" href="{{ config('app.url')}}/user/show/{{ $user->id }}">detail</a>
                            <a type="button" href="{{ config('app.url')}}/user/edit/{{ $user->id }}">edit</a>
                            <a type="button" href="{{ config('app.url')}}/user/delete/{{ $user->id }}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="content">
        <h1>Deleted Users List</h1>
        <table class="table">
            <thead>
                <td></td>
                <td>id</td>
                <td>first name</td>
                <td>last name</td>
                <td>full name</td>
                <td>date of birth</td>
                <td>email</td>
                <td>password</td>
                <td>created_at</td>
                <td>update_at</td>
                <td>Action</td>
            </thead>
            <tbody>
                @foreach ($all_deleted_users as $user)
                    <tr>
                        <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}"></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name}}</td>
                        <td>{{ $user->full_name}}</td>
                        <td>{{ $user->date_of_birth}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->password}}</td>
                        <td>{{ $user->created_at}}</td>
                        <td>{{ $user->update_at}}</td>
                        <td>
                            <a type="button" href="{{ config('app.url')}}/user/undo_delete/{{ $user->id }}">undo delete</a>
                            <a type="button" href="{{ config('app.url')}}/user/destroy/{{ $user->id }}">permanent delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="content">
        <a type="button" class="button" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
</body>
</html>