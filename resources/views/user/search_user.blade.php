<!DOCTYPE html>
<html>
<head>
    <title>Search User</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/user.js') }}"></script>
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
    @if ($results->isNotEmpty())
        @foreach ($results as $result)
            <p>{{ $result->first_name}}</p>
        @endforeach
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
            q: search_value
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