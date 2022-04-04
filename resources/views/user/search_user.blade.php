<!DOCTYPE html>
<html>
<head>
    <title>Search User</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
    <script type="text/javascript"  src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    <div class="content">
        <form id="search">
            <input type="text" name="search" placeholder="Search.." />
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="content">
    @if ($results)
        <table class="table">
            <caption>Users</caption>
            <thead>
                <td></td>
                <td>first name</td>
                <td>last name</td>
                <td>email</td>
                <td>created at</td>
                <td>action</td>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td><input type="checkbox" id="{{ $result->id }}" value="{{ $result->id }}"></td>
                        <td>{{ $result->first_name }}</td>
                        <td>{{ $result->last_name}}</td>
                        <td>{{ $result->email}}</td>
                        <td>{{ $result->created_at}}</td>
                        <td>
                            <a type="button" href="{{ config('app.url')}}/user/show/{{ $result->id }}">detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No User Found</p>
    @endif
    </div>
    <div id="searchdata"></div>
    <div class="content">
        <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
    <script>
    $(document).on('submit', 'form#search', function (event) {
    var search_value = $(this).find("input[name='search']").val();
    $.ajax({
        type: 'GET',
        dataType: 'html',
        url: '/handle_search',
        data: {
            search: search_value
        },
        success: function (data) {
            // Do some nice animation to show results
            $('#searchdata').html(data);
        }
    });
});
</script>
</body>
</html>