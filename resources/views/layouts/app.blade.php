<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('') }}" type="image/x-icon" />
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('style')

</head>

<body>
    <!-- Responsive navbar-->
    @include('layouts.navbar')

    <!-- Page content-->
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
