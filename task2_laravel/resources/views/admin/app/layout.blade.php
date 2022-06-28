<!DOCTYPE html>
<html>
<head>
    <title>Laravel Application</title>
    <!-- Styles -->
    <link href="{{ asset('css/tests.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/tests.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<style>

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
</head>
<body>

<div class="container">
    @yield('content')
</div>
   
</body>
</html>