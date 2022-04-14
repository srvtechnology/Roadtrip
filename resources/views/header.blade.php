 @if(session() && session()->has('roadtrip_admin'))
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Road Trip</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="<?php echo url('/'); ?>/dist/img/title_icon.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo url('/');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo url('/');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/toastr/toastr.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/dist/css/magnific-popup.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo url('/'); ?>/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a  class="nav-link">{{Request::segment(1)}}</a>
      </li> -->
     
      
    </ul>
   <ul class="navbar-nav ml-auto">
     <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin_logout')}}" class="nav-link">Logout</a>

      </li>
   </ul>
    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-image: url(<?php echo url('/'); ?>/dist/img/Splash_bg.png); ">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="<?php echo url('/'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Road Trip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            @if(Request::segment(1) == "user_list")
            <a href="{{route('user_list')}}" class="nav-link active">
            @else
            <a href="{{route('user_list')}}" class="nav-link ">
            @endif
            
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
               
              </p>
            </a>
          </li>
          
           <li class="nav-item">
             @if(Request::segment(1) == "daily_route_list")
             <a href="{{route('daily_route_list')}}" class="nav-link active">
             @else
             <a href="{{route('daily_route_list')}}" class="nav-link ">
             @endif
            
              <i class="nav-icon fas fa-map"></i>
              <p>
                Daily Routes
               
              </p>
            </a>
          </li>
          <!--
            <li class="nav-item">
            @if(Request::segment(1) == "list_dailyroute_map" || Request::segment(1) == "add_dailyroute_map")
             <a href="{{ route('list_dailyroute_map') }}" class="nav-link active">
            @else
             <a href="{{ route('list_dailyroute_map') }}" class="nav-link ">
            @endif
           
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Daily Route Map
               
              </p>
            </a>
          </li>
        -->

           <li class="nav-item">
            @if(Request::segment(1) == "podcast_list" || Request::segment(1) == "add_podcast" || Request::segment(1) == "edit_podcast" || Request::segment(1) == "view_podcast" )
            <a href="{{route('podcast_list')}}" class="nav-link active">
            @else
             <a href="{{ route('podcast_list') }}" class="nav-link ">
            @endif  
              <i class="nav-icon fa fa-microphone"></i>
              <p>
                Podcast
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('list_payment')}}" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Payment
               
              </p>
            </a>
          </li>
          <li class="nav-item">
             @if(Request::segment(1) == "list_package" || Request::segment(1) == "list_package_edit")
            <a href="{{route('list_package')}}" class="nav-link active">
                @else
            <a href="{{route('list_package')}}" class="nav-link">
            @endif
              <i class="nav-icon fas fa-box"></i>
              <p>
                Package
               
              </p>
            </a>
          </li>
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@else
            <script>
                window.location.href = "./";
            </script>
                
            
            @endif