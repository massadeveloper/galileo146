<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content=""
          name="description"/>
    <meta content="BitBossTest" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <title>{{ config('app.name', 'BitBossTest') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset("/css/app.css")}}" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico"/>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
   
</body>

</html>