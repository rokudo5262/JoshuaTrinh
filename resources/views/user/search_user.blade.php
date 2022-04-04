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
        <form >
            <input type="text" id="search" name="search" placeholder="Search.." />
            <!-- <button type="submit">Submit</button> -->
        </form>
    </div>

    <div class="content">
            <table class="table">
                <caption>Users</caption>
                <thead>
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
    @include('footer')
    <!-- <script>
    $(document).on('submit', 'form#search', function (event) {
    var search_value = $(this).find("input[name='search']").val();
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/handle_search',
        data: {
            search: search_value,
        },
        success: function (data) {
            console.log(data);
            var res='';
            $.each (data, function (key, value) {
            res +=
            '<tr>'+
                '<td>'+value.first_name+'</td>'+
                '<td>'+value.last_name+'</td>'+
                '<td>'+value.email+'</td>'+
                '<td>'+value.creatd_at+'</td>'+
           '</tr>';
            });
            $('tbody').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("error");
        }
    });
});
</script> -->

<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '/user/handle_search',
            data:{'search':$value},
            success:function(data) {
                $('tbody').html(data);
        }
    });
})
</script>
</body>
</html>