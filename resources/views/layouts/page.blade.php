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
  @include('includes.pagehead')
  <!--[content]-->
    	<section id="cont-wrap">
        	<!--[Process]-->
			@yield('content')
		
		</section>
		@include('includes.footer')
    <!--[/content]-->
    
</div>

</body>
</html>