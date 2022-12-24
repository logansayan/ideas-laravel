<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ideas | Never let your awesome ideas fade away!</title>
    <link rel="shortcut icon" href="/img/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/83ef5b7ffb.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-flash-message />
    <x-nav />
    @yield('content')
</body>
</html>