<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('style/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('style/css/owl.carousel.min.css') }}">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('style/css/style.css') }}">

    <title>Notification Application</title>
</head>

<body>
    <div class="container" id="app">
        @yield('contents')
    </div>


    <script src="{{asset('style/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('style/js/popper.min.js')}}"></script>
    <script src="{{asset('style/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('style/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('style/js/main.js')}}"></script>

    @stack('scripts')
</body>

</html>
