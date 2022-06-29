@extends('admin.app.layout')
@section('content')




<div class="row" style="padding-top:80px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Product Name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categories :</strong>
                <select class="form-control" name="category_id">
                    <option value="">Select</option>
                    @foreach($jay as $key => $value)

                    <option value=" {{ $value->id }}"> {{ $value->cname }}</option>
                    @endforeach

                </select>

            </div>
            @if ($errors->has('category_id'))
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @endif

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Image</strong>:</strong>
                <input type="file" name="image" class="form-control" value="{{old('name')}}">

            </div>
            @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!-- <strong>Add By:</strong> -->
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled hidden>
                <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->email }}" hidden>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                <select class="form-control" name="active">
                    <option value="">Select</option>
                    <option name="active" value="yes">Yes</option>
                    <option name="active" value="no">No</option>
                </select>
                @if ($errors->has('active'))
                <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection