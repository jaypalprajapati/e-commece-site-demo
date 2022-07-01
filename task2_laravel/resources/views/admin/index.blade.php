@extends('admin.layout')

@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Home Page</h2>
        </div>
        @if(auth()->user()->type ==' 1')
        <div class="pull-right">
            <a class="btn btn-success" href="admin/create"> Add New Admin</a>
            <!-- <a class="btn btn-warning" href="category">Category</a>
            <a class="btn btn-primary" href="product">Product</a> -->
        </div>
        @endif
    </div>
</div>
<div id="msg">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Hobbies</th>
        @if(auth()->user()->type ==' 1')
        <th width="280px">Action</th>
        @endif
    </tr>
    @foreach($data1 as $key => $value)
    <!-- <tr  id-="uid{{$value->id}}"> -->
       <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->email }}</td>
        <td>{{ $value->gender }}</td>
        <td>
            @foreach ($value->hobbies as $values)
            {{$values}}
            @endforeach
        </td>
        @if(auth()->user()->type ==' 1')
        <td>
            @if(request()->has('trashed'))
            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">
            <a href="{{ route('admin.restore', $value->id) }}" class="btn btn-success">Restore</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete">Delete</button>
            </form>
            @else
            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete">Delete</button>
            </form>

<!-- ajex_delete 
                <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                @csrf
                <button type="submit" data-id="{{$value->id}}" class="btn btn-danger deleteRecord">Delete</button> -->

            @endif
        </td>
        @endif
    </tr>
    @endforeach
</table>

{!! $data->links() !!}
<div class="float-end" style="text-align:right;">
    @if(request()->has('trashed'))
    <a href="{{ route('admin.index') }}" class="btn btn-info">View All Users</a>
    <a href="{{ route('admin.restoreAll') }}" class="btn btn-success">Restore All</a>
    @else
    <a href="{{ route('admin.index', ['trashed' => 'admin']) }}" class="btn btn-primary">View Deleted Users</a>
    @endif
</div>
<script>
$(document).ready(function() {

$(".deleteRecord").click(function() {

    if (confirm("Do you want to Delete this record")) {

        var id = $(this).data("id");

        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({

            url: "admin/" + id,

            type: 'DELETE',

            data: {

                "id": id,

                "_token": '{!! csrf_token() !!}',

            },

            success: function(response) {

                $("#uid" + id).remove();

            }

        });

    }

});

});
    </script>
@endsection