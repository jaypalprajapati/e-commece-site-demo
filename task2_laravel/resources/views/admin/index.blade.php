@extends('admin.layout')

@section('content')
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
    @foreach($data as $key => $value)
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
            <form action="{{ route('admin.destroy',$value->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('admin.edit',$value->id) }}">Edit</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger delete">Delete</button>

            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>

{!! $data->links() !!}
@endsection