<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Toyota</title>
    <link rel="stylesheet" href="{{ asset('asset_login/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
    @yield('content')
</body>
</html>
