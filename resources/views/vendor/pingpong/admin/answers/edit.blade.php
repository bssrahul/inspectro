@extends($layout)

@section('content-header')
	<h1>
		Edit Question
		&middot;
		<small>{!! link_to_route('admin.answers.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::answers.form', array('model' => $answer))
	</div>

@stop
