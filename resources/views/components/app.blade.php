<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Motorbikes' }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css') }}">
</head>
<body>
<main class="container">
    {{ $slot }}
</main>

<script src="{{ asset('bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
