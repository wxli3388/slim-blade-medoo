<!DOCTYPE html>
<html>
<head>
  {{-- Include the meta files --}}
  @include('layout.meta')
  
  {{-- Include the basic css files --}}  
  @css("/plugins/adminlte/bootstrap/dist/css/bootstrap.min.css")
	@css("/plugins/adminlte/dist/css/AdminLTE.min.css")
	@css("/plugins/adminlte/dist/css/skins/_all-skins.min.css")
	@css("/plugins/font-awesome/css/font-awesome.min.css")
	
  @section('css.custom')
        
  @show
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  {{-- Include the header --}}
  @include('layout.header')

  {{-- Include the sidebar --}}
  @include('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- Include the title and breadcrum --}}
    @include('layout.title')

    @section('content')
        
    @show
    
  </div>
  <!-- /.content-wrapper -->
  
  {{-- Include the footer --}}
  @include('layout.footer')

</div>
<!-- ./wrapper -->

{{-- Include the basic js files --}}
  @js("/plugins/jQuery/jquery.min.js")
  {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
  <script>$.widget.bridge('uibutton', $.ui.button);</script>
	@js("/plugins/adminlte/dist/js/adminlte.min.js")
  @js("/plugins/adminlte/bootstrap/dist/js/bootstrap.min.js")
  @js("/plugins/adminlte/plugins/jQueryUI/jquery-ui.min.js")
  
  
@section('js.custom')

@show

</body>
</html>
