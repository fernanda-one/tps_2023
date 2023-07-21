<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <!-- Replace the font paths according to your file names and folder structure -->
    <link rel="stylesheet" href="{{ asset('fonts/Poppins-Regular.ttf') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/Poppins-Bold.ttf') }}" type="text/css">
</head>
<body>
    @yield('body')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
