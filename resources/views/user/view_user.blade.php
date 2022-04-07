@extends('layout.app')

@section('title', 'View User')

@section('content')
    <div class="content">
        <h2>Users List</h2>
        <!-- <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/search">Search User</a> -->
        <a type="button" class="button button-primary" href="{{ config('app.url')}}/user/create">Create User</a>
        <form id="solf_delete_multiple_user">
            @csrf
            <input type="hidden" id="ids" value="">
            <button type="summit" class="button button-primary" name="multiple_delete">Multiple Delete</button>
        </form>
        <form id="search" method="get" action="{{ config('app.url')}}/user">
            <input type="text" name="search" placeholder="Search.." />
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="content">
    <div class="alert alert-success" style="display:none"></div>
        @if (count($all_users) == 0)
            <p>No data to display</p>
        @else
            <table class="table">
                <caption>Users</caption>
                <thead>
                    <td></td>
                    <td>Id</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>created at</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($all_users as $user)
                        <tr id="{{ $user->id }}">
                            <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
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
                    console.log(test);
                    // test.each().jQuery('checkbox[id='test[i]').closect('tr').hide();
                    jQuery('.alert').show();
                    jQuery('.alert').html(result.success);      
                    },
                });
            });
        });
</script>
@endsection