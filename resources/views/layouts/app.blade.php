<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/navebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/collection.css') }}">
    <!-- CSS -->
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> --}}
    <!-- Default theme -->
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/> --}}
    {{-- Owl Carousl --}}
    <link rel="stylesheet" href="{{'assets/exzoom/jquery.exzoom.css' }}">
    <link rel="stylesheet" href="{{'assets/css/owl.carousel.css' }}">
    <link rel="stylesheet" href="{{'assets/css/owl.carousel.min.css' }}">
    <link rel="stylesheet" href="{{'assets/css/owl.theme.default.min.css'}}">
    @livewireStyles
</head>
<body>


    @include('frontend.navebar')
      {{ $slot }}
    @include('frontend.footer.footer')





    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous">
    </script>
    <script src="{{'assets/js/owl.carousel.min.js'}}"></script>

     <script src="{{ 'assets/exzoom/jquery.exzoom.js' }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
   
    {{-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> --}}
    
    {{-- <script>
        window.addEventListener('message', event => {
        alertify.set('notifier','position', 'top-right');
        alertify.success(event.detail.text);
    });
    </script> --}}
    @livewireScripts
    @stack('script')
</body>
</html>