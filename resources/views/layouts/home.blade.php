<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
	<script>
$('#modal-content').on('shown.bs.modal', function() {
       $("body.modal-open").removeAttr("style");
 });
</script>

  </head>
  <body>
  <!--div class="alert alert-danger response-msg" style="text-align: center;" id="custom_error_client"></div>
  <div class="alert alert-success response-msg" style="text-align: center;" id="custom_success_client"></div-->
  <div class="wrapper"> 
  @include('includes.header')
  <!--[content]-->
    	<section id="cont-wrap">
        	<!--[Process]-->
  @if (Session::has('custom_error') )
	<div class="alert alert-danger response-msg" style="text-align: center;" id="custom_error">
		{{ session('custom_error') }}
			{{Session::forget('custom_error')}}
	</div>
	@endif	
	@if (Session::has('custom_success'))
			<div class="alert alert-success response-msg" style="text-align: center;" id="custom_success">
				{{ session('custom_success') }}
			</div>
			{{Session::forget('custom_success')}}
	@endif	
	
	@yield('content')
	@include('includes.footer')
	
        </section>
    <!--[/content]-->
    
</div>

</body>
</html>