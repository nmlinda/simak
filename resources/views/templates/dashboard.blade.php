<!DOCTYPE html>
<html>
@include('templates.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>AS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Simak</b>Asrama</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    @include('templates.partials._navbar')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('templates.partials._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('templates.partials._footer')

  <!-- Control Sidebar -->
  @include('templates.partials._control-side')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('templates.partials._scripts')
</body>
</html>
