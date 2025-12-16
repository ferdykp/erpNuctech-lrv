@push('head')
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ERP Nuctech</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
