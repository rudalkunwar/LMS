<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('title')
</head>

<body>
    @yield('content')
</body>
@stack('script')

</html>
