<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
    <script src="{{ asset('js/bootstrap.min.js')}}" ></script>
    
    <title>Document</title>
</head>
<body>
    
    <div class='container'>
        @yield('content')
    </div>


</body>
</html>