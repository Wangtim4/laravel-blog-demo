<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Blog</title>
</head>
<body>
    <main class="mt-3">
        @if (session()->has('notice'))
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">{{ session()->get('notice') }}</h4>
            </div>
        @endif
        @yield('main')
    </main>
    <script src="{{ asset('js.app.js') }}"></script>
</body>
</html>