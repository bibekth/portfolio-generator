<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script> --}}
    {{-- <style>
        .techenfield-nav-section {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 5vh;
            width: 100vw;
            /* z-index: 1; */
        }

        .techenfield-footer-section {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4vh;
            width: 100vw;
        }
    </style> --}}
</head>

<body>
    <div class="container-fluid">
        <div class="techenfield-nav-section">
            @include('dashboard.layouts.nav')
        </div>
        <div class="techenfield-content-section">
            @yield('admin-content')
        </div>
        <div class="techenfield-footer-section">
            @include('dashboard.layouts.footer')
        </div>
    </div>
</body>
</html>
