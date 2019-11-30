<!DOCTYPE html>
<html>
<head>
  @include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  {{-- Header --}}
  @include('admin.layouts.header')


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('admin.layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  @section('body')
    {{-- expr --}}
  @show

{{--   @include('admin.layouts.body') --}}

  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  @include('admin.layouts.controlsidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('admin.layouts.scripts')


</body>
</html>
