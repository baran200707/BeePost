<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'BeePost')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@yield('content')

<div class="image-lightbox" data-lightbox aria-hidden="true">
    <button class="lightbox-close" type="button" data-lightbox-close aria-label="Закрыть изображение">&times;</button>
    <img class="lightbox-image" data-lightbox-image alt="">
</div>
</body>
</html>
