<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Filme Database')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">





    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body class="hold-transition skin-green-light sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a  class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">FD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" ><b href="/news" >Filme Datenbank</b> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">



                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"> <i class="fa   fa-user"></i> {{ auth()->user()->username }}</span>
                        </a>

                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <p>
                                    {{ auth()->user()->username }}
                                    <small>Erstellt am {{ auth()->user()->created_at->format('d.m.Y') }}</small>
                                </p>
                            </li>


                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/user/{{ auth()->user()->id }}" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">ausloggen</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

@include('navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            @include('errors')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">

        made with ❤ by Daniel Riebel


    </footer>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset(' bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
