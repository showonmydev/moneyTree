<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Page</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/Main.css ">
    <link rel="stylesheet" href="/css/foodcss.css ">
</head>
<body>




@include('Partials.Nav')

@yield('body')

@include('Partials.HomePageModal')

@include('Partials.TreeViaCategoryModal')

@include('Partials.FoodModal')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>
<script src="/js/Main.js"></script>

</body>

</html>