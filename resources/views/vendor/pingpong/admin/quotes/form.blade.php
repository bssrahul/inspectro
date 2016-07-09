@if(isset($model))
{!! Form::model($model, ['method' => 'PUT', 'files' => true, 'id'=>'ReplyForm','route' => ['admin.quotes.update', $model->id]]) !!}

@else
{!! Form::open(['files' => true, 'route' => 'admin.quotes.store' , 'id'=>'ReplyForm']) !!}
@endif
	@foreach($requestData as $request)
		<?php  if(!empty($request->email)){
					$email=$request->email;
					$name=$request->full_name;
					$id=$request->id;?>
					
				<div class="form-group">
					
					{!! Form::hidden('id',$id, ['class' => 'form-control required', 'readonly'=>true]) !!}
				
				</div>
				<div class="form-group">
					{!! Form::label('full_name', 'Name:') !!}
					{!! Form::text('full_name',$name, ['class' => 'form-control required', 'readonly'=>true]) !!}
					{!! $errors->first('full_name', '<div class="text-danger">:message</div>') !!}
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email:') !!}
					{!! Form::text('email',$email, ['class' => 'form-control required', 'readonly'=>true]) !!}
					{!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
				</div>
				
				<?php }  
				if(!empty($request->phone_no)){
					 $phone=$request->phone_no; ?>
						<div class="form-group">
					{!! Form::label('phone_no', 'Phone No:') !!}
					{!! Form::text('phone_no',$phone, ['class' => 'form-control required', 'readonly'=>true]) !!}
					{!! $errors->first('phone_no', '<div class="text-danger">:message</div>') !!}
				</div>
					
			<?php	} ?>
				
		
		
	
			<div class="form-group">
						{!! Form::label('message', 'Message:') !!}
						{!! Form::textarea('message', null, ['class' => 'form-control required', 'id' => 'ckeditor']) !!}
						{!! $errors->first('message', '<div class="text-danger">:message</div>') !!}
					</div>
	
	@endforeach
	<div class="form-group">
		{!! Form::submit(isset($model) ? 'Update' : 'Send', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@section('style')
<link href="{!! admin_asset('adminlte/css/custom.css') !!}" rel="stylesheet" type="text/css" />
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
				$('#ReplyForm').validate();
			});
	</script>
@stop