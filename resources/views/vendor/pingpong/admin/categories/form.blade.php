@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'route' => ['admin.categories.update', $model->id]]) !!}
@else
{!! Form::open(['files' => true, 'route' => 'admin.categories.store']) !!}
@endif
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		{!! $errors->first('title', '<div class="text-danger">:message</div>') !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('status', 'Description:') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'ckeditor']) !!}
		{!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
	</div>
	
	@if(!empty($id))
	<div class="form-group">

		{!! Form::hidden('parent_id',$id,null,['class' => 'form-control']) !!}
		
	</div>
	@else
	<div class="form-group">

		{!! Form::hidden('parent_id',null,['class' => 'form-control']) !!}
		
	</div>
	@endif
	@if(!empty($type))
	<div class="form-group">
		{!! Form::label('type', 'Type:') !!}
		{!! Form::text('type',$type,['class' => 'form-control','readonly'=>'true']) !!}
		{!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
	</div>
	
	@if($type=='question')
	<div class="form-group" id='sortingKey'>
		{!! Form::label('sorting_key', 'Sort Key:') !!}
		{!! Form::number('sorting_key', null, ['class' => 'form-control']) !!}
		{!! $errors->first('sorting_key', '<div class="text-danger">:message</div>') !!}
	</div>
	@endif
	@else
	<div class="form-group">
		{!! Form::label('type', 'Type:') !!}
		{!! Form::text('type',null,['class' => 'form-control','id'=>'type','readonly'=>'true']) !!}
		{!! $errors->first('type', '<div class="text-danger">:message</div>') !!}
	</div>
	@endif
	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@section('script')
	
	{!! script('vendor/ckeditor/ckeditor.js') !!}
	{!! script('vendor/ckfinder/ckfinder.js') !!}
	
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

	
@stop