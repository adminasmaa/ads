<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title> الفنادق- @yield('title')</title>
    <!-- Google font-->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel=" stylesheet" type="text/css" href="{{asset('assets/css/vendors/themify.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/feather-icon.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="https://admin.pixelstrap.com/cuba/assets/css/vendors/calendar.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="https://admin.pixelstrap.com/cuba/assets/css/style.css">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">

    <!--ghada add  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css'>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <!--ghada add-->
    <!-- rating css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/rating.css')}}"/>
    <link rel="stylesheet" type="text/css" href='{{asset('assets/css/vendors/calendar.css')}}'>

    <!-- rating css -->
    @yield('css')
    <style>
        .page-wrapper .page-body-wrapper .page-title {
                font-family: 'Cairo', sans-serif !important;

            }
        .d-inline {
            color: #d91414;
        }

        div.dt-buttons {
            float: right;
            width: auto;
        }

        .dataTables_filter {
            float: right;
        }

    </style>
    @if(Request::url()=="roles")
        <style>
            .page-wrapper .page-body-wrapper .page-title {
                padding: 30px 30px;

            }
        </style
    @endif


</head>

