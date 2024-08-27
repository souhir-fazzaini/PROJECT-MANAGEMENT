<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" sizes="16x16" src="{{asset('backend/dist/img/avatar2.png')}}">
  <title>PRIQH2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css')}}">
 <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.composants.navbar')

    <!-- Main Sidebar Container -->
    @include('layouts.composants.sidebar')


   <!-- @yield('content') -->
   <!-- Page Content -->
  

   <!-- Main Footer -->
   @include('layouts.composants.footer')
   <!-- ./wrapper -->
  </div>
   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <script src="{{asset('backend/plugins/jquery/jquery.min.js ')}}"></script>
   <!-- Bootstrap 4 -->
   <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
   <!-- overlayScrollbars -->
   <script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  
 
  </body>
  </html>
   
