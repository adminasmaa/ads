<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>7agz حجز </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/owlcarousel/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/owlcarousel/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/vendor/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/front/vendor/ilightbox/css/jquery.lightbox.css')}}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/front/vendor/intl-input/css/intlTelInput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/daterangepicker/daterangepicker.css')}}" />
    <!-- <link rel="stylesheet" href="https://saeeh.com/assets/css/jquery-ui.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css" rel="stylesheet"/> -->
<!-- https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css -->
    <link rel="Stylesheet" type="text/css" href="{{asset('assets/front/vendor/daterangepicker/jquery-ui.css')}}" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
    @stack('css')

</head>

<body>


    <!-- ======= Header ======= -->
    @include('pages.front.layout.header')
    <!-- End Header -->

   
    {{ $slot }}
    <!-- ======= Footer ======= -->
    @include('pages.front.layout.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/front/js/jquery-2.2.1.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/front/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/owlcarousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/front/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/front/vendor/ilightbox/js/jquery.lightbox.min.js')}}"></script>
    <script type="text/javascript">
        
        var countries = {!! json_encode(App\Models\Country::all()) !!};
    </script>
    <script src="{{asset('assets/front/vendor/intl-input/js/intlTelInput.js')}}"></script>
    <!-- datepicker JS Files -->
    <script type="text/javascript" src="{{asset('assets/front/vendor/daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/front/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker JS Files -->
    <script src="https://saeeh.com/Mktba/themes/7agz-2021/assets/js/jquery-2.2.1.min.js"></script>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('assets/front/js/main.js')}}"></script>


    @stack('scripts')

</body>

</html>
