@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'id'=>'blockForm','route' => ['admin.blocks.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.blocks.store', 'id'=>'blockForm']) !!}
@endif
	
	<div class="form-group">
		{!! Form::label('type', 'Type:') !!}
		{!! Form::select('type',[''=>'-- Select Type -- ','process'=>'How does it Work','services'=>'We are here to Serve You','features'=>'Our Features','testimonial'=>'Testimonial'],null ,['class' => 'form-control required']) !!}
		{!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Description:') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control required', 'id' => 'ckeditor']) !!}
		{!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('long_description', 'Long Description:') !!}
		{!! Form::textarea('long_description', null, ['class' => 'form-control required', 'id' => 'ckeditor1']) !!}
		{!! $errors->first('long_description', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group" id="username">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group" id="userlocation">
		{!! Form::label('location', 'Location:') !!}
		{!! Form::text('location', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('location', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('image', 'Image:') !!}
		{!! Form::file('image', ['class' => 'form-control ','id'=>'browseImg']) !!}
		{!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		<?php $destinationPath =  url().'/public/uploads/';
	
		if(!empty($blocks->image)){
		?>
		<img src="<?php echo $destinationPath."/".$blocks->image ; ?> " class="img" id="showImg" alt="Bannar Image">
		<?php } ?>
		
	</div>
	
	
	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@section('style')

<link href="{!! admin_asset('adminlte/css/custom.css') !!}" rel="stylesheet" type="text/css" />

<style>
textarea.form-control {
    height: 200px;
}
.img{
	height:100px;
	width:150px;
	border-radius: 10px;
	<!-- border: 3px solid #e1e1e1; -->
}
</style>
@stop
@section('script')

	<script src="{!! admin_asset('vendor/ckeditor/ckeditor.js') !!}" type="text/javascript"></script>
	<script src="{!! admin_asset('vendor/ckfinder/ckfinder.js') !!}" type="text/javascript"></script>
	
	
	<script type="text/javascript">
		CKEDITOR.editorConfig = function( config ) {
			var prefix = '/{!! option("ckfinder.prefix") !!}';

		   config.filebrowserBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html';
		   config.filebrowserImageBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Images';
		   config.filebrowserFlashBrowseUrl = prefix + '/vendor/ckfinder/ckfinder.html?type=Flash';
		   config.filebrowserUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
		   config.filebrowserImageUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
		   config.filebrowserFlashUploadUrl = prefix + '/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		};

		var editor = CKEDITOR.replace( 'ckeditor' );
		var editor1 = CKEDITOR.replace( 'ckeditor1' );
		var prefix = '/{!! option("ckfinder.prefix") !!}';
		CKFinder.setupCKEditor( editor, prefix + '/vendor/ckfinder/') ;
		CKFinder.setupCKEditor( editor1, prefix + '/vendor/ckfinder/') ;
	</script>

	<script src="{!! admin_asset('components/jquery/jquery.validate.js') !!}" type="text/javascript"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				
				$('#blockForm').validate();
			});
			
			$(document).change(function() {
				var type = $('#type').val();
				if(type == 'testimonial'){
					$('#username').show();
					$('#userlocation').show();
				}else{
					$('#username').hide();
					$('#userlocation').hide();
				}
				
			});
			$(document).ready(function() {
				var type = $('#type').val();
				if(type == 'testimonial'){
					$('#username').show();
					$('#userlocation').show();
				}else{
					$('#username').hide();
					$('#userlocation').hide();
				}
				
			});
	</script>
	
	
	<script type="text/javascript">
	$(document).ready(function(){
	<?php if((isset($optId)) ){ ?>
		var optId = "<?php echo $optId;  ?>";
		
   function hideElements()
	{
		
		// for disable a block
		var $selectdropDown = $('#service_id') ,
		name = $selectdropDown.prop('name') ,
		$form = $selectdropDown.parent('form');
		$selectdropDown.data('original-name',name); 
		$selectdropDown.addClass('disabled').prop({'name' : name + "_1" , disabled : true});
		 
	}
	function showElements(optId)
	{
		$('.sh'+optId).show();
		//$('input[name="options['+optId+']"]').closest( ".hclass" ).show();
	} 
	
	if(optId != "" ) {
		
		hideElements();
		showElements(optId);
		
    // optId could get resolved and it's defined
     }
	<?php } ?>
	
}); 
$(document).ready(function() {
	function readURL(input) {
		if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#showImg').attr('src', e.target.result);
					}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#browseImg").change(function() {
	readURL(this);
	});
});	
	
	
	</script>
@stop
