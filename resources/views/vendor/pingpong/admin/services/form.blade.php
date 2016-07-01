@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'id'=>'ServiceForm','route' => ['admin.services.update', $model->id]]) !!}

@else
{!! Form::open(['files' => true, 'route' => 'admin.services.store' , 'id'=>'ServiceForm']) !!}
@endif
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
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@section('style')
<link href="{!! admin_asset('adminlte/css/custom.css') !!}" rel="stylesheet" type="text/css" />
@stop
@section('script')
	
	
	
	
	
	<script src="{!! admin_asset('components/jquery/jquery.validate.js') !!}" type="text/javascript"></script>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#ServiceForm').validate();
			});
	</script>
@stop