@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'id'=>'pageForm','route' => ['admin.pages.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.pages.store', 'id'=>'pageForm']) !!}
@endif
	
	<div class="form-group">
		{!! Form::label('page_title', 'Page Title:') !!}
		{!! Form::text('page_title', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('page_title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('page_heading', 'Page Heading:') !!}
		{!! Form::text('page_heading', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('page_heading', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('page_link', 'Page Link:') !!}
		{!! Form::text('page_link', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('page_link', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('page_content', 'Page Content:') !!}
		{!! Form::textarea('page_content', null, ['class' => 'form-control required', 'id' => 'ckeditor']) !!}
		{!! $errors->first('page_content', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('bannar_image', 'Bannar Image:') !!}
		{!! Form::file('bannar_image', ['class' => 'form-control ','id'=>'browseImg']) !!}
		{!! $errors->first('bannar_image', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		<?php $destinationPath =  url().'/public/uploads/';
	
		if(!empty($pages->bannar_image)){
		?>
		<img src="<?php echo $destinationPath."/".$pages->bannar_image ; ?> " class="img" id="showImg" alt="Bannar Image">
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
	border: 3px solid #e1e1e1;
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
		var prefix = '/{!! option("ckfinder.prefix") !!}';
		CKFinder.setupCKEditor( editor, prefix + '/vendor/ckfinder/') ;
	</script>

	<script src="{!! admin_asset('components/jquery/jquery.validate.js') !!}" type="text/javascript"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#pageForm').validate();
			});
	</script>
	
	
	<script type="text/javascript">
	$(document).ready(function(){
	<?php if((isset($optId)) ){ ?>
		var optId = "<?php echo $optId;  ?>";
		
   function hideElements()
	{
		
		// for disable a page
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
