<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>View User</title>
    <!-- Styles etc. -->
</head>
<body>
    @include('header')
    <a type="button" href="{{ config('app.url')}}/user/create">Create user</a>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1>Users List</h1>
            <table>
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
    </div>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1>Deleted Users List</h1>
            <table>
                <thead>
                    <td></td>
                    <td>id</td>
                    <td>first name</td>
                    <td>last name</td>
                    <td>date of birth</td>
                    <td>email</td>
                    <td>password</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($all_deleted_users as $user)
                        <tr>
                            <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name}}</td>
                            <td>{{ $user->date_of_birth}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->password}}</td>
                            <td>
                                <a type="button" href="{{ config('app.url')}}/user/destroy/{{ $user->id }}">permanent delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex-center position-ref full-height">
        <a type="button" href="{{ config('app.url')}}/user">back</a>
    </div>
</body>
</html>