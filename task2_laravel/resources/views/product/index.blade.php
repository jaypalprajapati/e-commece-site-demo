@extends('admin.layout')

@section('content')
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product Details</h2>
        </div>
        <div class="pull-right">
        @if(auth()->user()->type ==' 1' || auth()->user()->type ==' 0')
            <a class="btn btn-warning" href="product/create">Add New Product</a>
           @endif
            <select style="float:right;" id="category_id" name="cat_id" class="btn btn-info">
                <option value="">Select</option>
                @foreach($jay as $key => $value)
                <option value="{{ $value->id}}">{{ $value->cname}}</option>
                @endforeach
            </select>
        </div>
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
        <th>Product Name</th>
        <th>Category Name</th>
        <th>Product Image</th>
        <th>Add By</th>
        <th>Active</th>
        @if(auth()->user()->type ==' 1' || auth()->user()->type =='0')
        <th>Action</th>
        @endif
    </tr>
    <tbody id="tbody">
        @foreach($data as $key => $value)
        <tr>
            <td>{{$value->id  }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->cname }}</td>

            <td><img src=" {{ asset('public/images/' . $value->image)}}" width="160" height="80"></td>

            <td>{{ $value->user_id }}</td>
            <td>{{ $value->active }}</td>
            @if(auth()->user()->type ==' 1' || auth()->user()->type =='0')
            <td>
                @if(request()->has('trashed'))

                <a href="{{ route('product.restore', $value->id) }}" class="btn btn-success">Restore</a>

                @else

                <form action="{{ route('product.destroy',$value->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a>

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger delete">Delete</button>
                </form>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@if(auth()->user()->type ==' 1' || auth()->user()->type ==' 0')
<div class="float-end" style="text-align:right;">

    @if(request()->has('trashed'))

    <a href="{{ route('product.index') }}" class="btn btn-info">View All products</a>

    <a href="{{ route('product.restoreAll') }}" class="btn btn-success">Restore All</a>

    @else

    <a href="{{ route('product.index', ['trashed' => 'product']) }}" class="btn btn-primary">View Deleted

        product</a>

    @endif
  
</div>
@endif
<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var category = $(this).val();
            $.ajax({
                url: "{{route('filterProduct')}}",
                type: "GET",
                data: {
                    'category': category
                },
                success: function(data) {
                    var products = data;
                    var html = '';
                    if (products.length > 0) {
                        for (let i = 0; i < products.length; i++) {
                            html += '<tr>\
                                        <td>' + products[i]['id'] + '</td>\
                                        <td>' + products[i]['name'] + '</td>\
                                        <td>' + products[i]['category_id'] + '</td>\
                                        <td> <img src="public/images/' + products[i]['image'] + '"width="160" height="80"> </td>\
                                        <td>' + products[i]['user_id'] + '</td>\
                                        <td>' + products[i]['active'] + '</td>\
                                         </tr>';
                        }
                    } else {
                        html += '<tr>\
                                    <td>Current</td>\
                                    </tr>';
                    }
                    $("#tbody").html(html);
                }
            });
        });
    });
</script>

@endsection