@extends('admin.app.layout')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
</style>
@section('content')
<div class="row" style="padding-top:80px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>New Users</h2>
        </div>
        <div class="pull-right">

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

<form action="{{ url('store') }}" method="POST" id="regForm">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group form-control">
                <strong>Gender:</strong>

                <input type="radio" name="gender" value="male" checked value="{{old('gender')}}">Male
                <input type="radio" name="gender" value="female" value="{{old('gender')}}">Female

                @if ($errors->has('gender'))
                <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="">
                <br>
                <strong>Hobbies:</strong><br>
                <input type="checkbox" name="hobbies[]" value="Cricket">Cricket<br>
                <input type="checkbox" name="hobbies[]" value="Singing">Singing<br>
                <input type="checkbox" name="hobbies[]" value="Swimming">Swimming<br>
                <input type="checkbox" name="hobbies[]" value="Shopping">Shopping<br>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#regForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 15,
                    minlength: 2,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength: 4,
                    maxlength: 8,
                },
                gender: {
                    required: true,
                },
                hobbies: {
                    required: true,
                },

            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: " Name cannot be more than 15 characters",
                    minlength: " Name cannot be less than 2 characters"
                },

                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },

                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 4 characters",
                    maxlength: "Password must be more than 8 characters"
                },

                gender: {
                    required: "Please select the gender",
                },
                hobbies: {
                    required: "Please select the hobbies",
                },

            }
        });
    });
</script>
@endsection