@extends('admin.app.layout')
@extends('admin.app.layout1')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Styles -->

</head>

<body class="antialiased">
    <center>
        <h2>Welcome E-Commerce Site</h2>
    </center>
    <div class="relative flex items-top   sm:pt-0">
        <div class="row" style="margin-top: 5rem;">

            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                <!-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> -->
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline button"><span>Log in </span></a>
                <!-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif -->
                @endauth
            </div>
            @endif
        </div>
    </div>

    <div class="container">
        <select style="float:right;" id="category_id" name="cat_id" class="btn btn-info">
            <option value="">Select</option>
            @foreach($jay as $key => $value)
            <option value="{{ $value->id}}">{{ $value->cname}}</option>
            @endforeach
        </select>
        <a style="float:right;" class="navbar-brand" href="{{ url('/') }}" title="Refresh"> <i class="fa fa-refresh" aria-hidden="true"></a></i>

        <table class="table table-bordered">
            <tr style="background-color:navy; color:white;">
                <th>No</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Product Image</th>
                <!-- <th>Add By</th> -->
                <th>Active</th>

            </tr>
            <tbody id="tbody">
                @foreach($data as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->cname }}</td>
                    <td><img src=" {{ asset('public/images/' . $value->image)}}" width="160" height="80"></td>
                    <!-- <td>{{ $value->user_id  }}</td> -->
                    <td>{{ $value->active }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

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
                                        <td>' + products[i]['active'] + '</td>\
                                        </tr>';
                            }
                        } else {
                            html += '<tr>\
                                    <td>No Products Found</td>\
                                    </tr>';
                        }
                        $("#tbody").html(html);
                    }
                });
            });
        });
    </script>

</body>

</html>