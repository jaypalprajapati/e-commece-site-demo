<!DOCTYPE html>
<html>

<head>
    <title>Laravel Application</title>
    <!-- Styles -->
    <link href="{{ asset('css/tests.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/tests.js')}}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        // $(document).ready(function() {

        //     $('.delete').click(function(e) {

        //         if (!confirm('Are you sure you want to delete this product?')) {

        //             e.preventDefault();

        //         }

        //     });

        // });
    </script>
    <style>
        svg {
            height: 15px
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: navy !important;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .buttonloginlogin {
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 15px;
            padding: 10px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .buttonlogin span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .buttonlogin span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .buttonlogin:hover span {
            padding-right: 25px;
            color: red;
        }

        .buttonlogin:hover span:after {
            opacity: 1;
            right: 0;
            color: red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("#msg").remove();
            }, 2000); // 2 secs

        });
    </script>

</head>

<body>
    @if(auth()->user()->type ==' 1' || auth()->user()->type ==' 0')
    <ul>
        <li><a href="admin">Admin</a></li>
        <li><a href="category">Category</a></li>
        <li><a href="product">Product</a></li>
        <li style="float:right;background-color:navy;" class="buttonlogin"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>Logout </span></a></li>
        <li style="float:right;"><a href="#"> {{ Auth::user()->email }}</a></li>
    </ul>
    @else

    <ul>

        <li><a href="profile">Profile</a></li>
        <li><a href="product">Product</a></li>
        <li style="float:right;background-color:navy;" class="buttonlogin"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>Logout </span></a></li>
        <li style="float:right;"><a href="#"> {{ Auth::user()->email }}</a></li>
    </ul>
    @endif

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="container">
        @yield('content')
    </div>

</body>
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
<script>
    $(document).ready(function() {
        $("#editForm").validate({
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
                cat_name: {
                    required: true,
                    maxlength: 15,
                    minlength: 2,
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

</html>