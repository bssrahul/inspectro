@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'id'=>'QuestionForm','route' => ['admin.questions.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.questions.store', 'id'=>'QuestionForm']) !!}
@endif
	
	<div class="form-group">
	
		{!! Form::label('service_id', 'Service:') !!}		
		{!! Form::select('service_id',$serviceArr, null, ['class' => 'form-control required ']) !!}
		{!! $errors->first('service_id', '<div class="text-danger">:message</div>') !!}
		<?php if(!empty($servid)){?>
		<input type="hidden" name="service_id" value="<?php echo $servid;?>">
		<?php } ?>
	</div>
	
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control	required']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
	
		{!! Form::label('form_type_id', 'Form Type:') !!}		
		{!! Form::select('form_type_id',$formTypeArr, null, ['class' => 'form-control required']) !!}
		{!! $errors->first('form_type_id', '<div class="text-danger">:message</div>') !!}
		
	</div>
	<div class="form-group">
		
		{!! Form::label('other_custom_field', '  Other Custom Input Field  :  ') !!}	
		&nbsp;&nbsp;&nbsp;
		{!! Form::checkbox('other_custom_field') !!} 
		</br>
		<span> <?php echo"( If you need Other Input field, Please check above box )";?> </span>
		{!! $errors->first('other_custom_field', '<div class="text-danger">:message</div>') !!}
		
	</div>
	<div class="form-group">
		{!! Form::label('description_1', 'Description 1:') !!}
		{!! Form::textarea('description_1', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('description_1', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description_2', 'Description 2:') !!}
		{!! Form::textarea('description_2', null, ['class' => 'form-control required']) !!}
		{!! $errors->first('description_2', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@section('style')

<link href="{!! admin_asset('adminlte/css/custom.css') !!}" rel="stylesheet" type="text/css" />

<style>
textarea.form-control {
    height: 100px;
}
</style>
@stop
@section('script')

	<script src="{!! admin_asset('components/jquery/jquery.validate.js') !!}" type="text/javascript"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#QuestionForm').validate();
			});
	</script>
	
	
	<script type="text/javascript">
	$(document).ready(function(){
	<?php if((isset($optId)) ){ ?>
		var optId = "<?php echo $optId;  ?>";
		
   function hideElements()
	{
		
		// for disable a Question
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
	
	</script>
@stop