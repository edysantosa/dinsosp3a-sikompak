<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sikompak | Log in ke sistem</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        @yield('content')
    </div>
    <!-- /.login-box -->

    <script src="{{ asset('dist/js/login.js') }}"></script>
</body>
</html>
