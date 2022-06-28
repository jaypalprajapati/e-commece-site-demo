@extends('admin.app.layout')
   
@section('content')
    <div class="row"  style="padding-top:80px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
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
  
    <form action="{{ route('admin.update',$admin->id) }}" method="POST" id="editForm">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text"id="name" name="name" value="{{ $admin->name }}" class="form-control" placeholder="Name">
                    @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" value="{{ $admin->password }}" class="form-control" placeholder="password">
                    @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-control">
                    <strong>Gender:</strong>
                    <input type="radio" name="gender" value="male" {{ $admin->gender=="male"? "checked" : "" }}>Male
                    <input type="radio" name="gender" value="female" {{ $admin->gender=="female"? "checked" : "" }}>Female
                    @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-control">
                <strong>Hobbies:</strong><br>
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Cricket" {{ in_array('Cricket', $admin->hobbies ) ? 'checked' : '' }}> Cricket
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing" {{ in_array('Singing', $admin->hobbies ) ? 'checked' : '' }}> Singing
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Swimming" {{ in_array('Swimming', $admin->hobbies ) ? 'checked' : '' }}> Swimming
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Shopping" {{ in_array('Shopping', $admin->hobbies ) ? 'checked' : '' }}> Shopping
                @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection