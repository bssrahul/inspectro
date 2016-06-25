@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.questions.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.questions.store']) !!}
@endif
	
	<div class="form-group">
	
		{!! Form::label('service_id', 'Service:') !!}		
		{!! Form::select('service_id',$serviceArr, null, ['class' => 'form-control']) !!}
		{!! $errors->first('service_id', '<div class="text-danger">:message</div>') !!}
		
		
		
	</div>
	
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
	
		{!! Form::label('form_type_id', 'Form Type:') !!}		
		{!! Form::select('form_type_id',$formTypeArr, null, ['class' => 'form-control']) !!}
		{!! $errors->first('form_type_id', '<div class="text-danger">:message</div>') !!}
		
	</div>
	<div class="form-group">
		{!! Form::label('description_1', 'Description 1:') !!}
		{!! Form::textarea('description_1', null, ['class' => 'form-control']) !!}
		{!! $errors->first('description_1', '<div class="text-danger">:message</div>') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description_2', 'Description 2:') !!}
		{!! Form::textarea('description_2', null, ['class' => 'form-control']) !!}
		{!! $errors->first('description_2', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@section('style')
<style>
textarea.form-control {
    height: 100px;
}
</style>
@stop
