@extends($layout)

@section('content-header')
	<h1>
		Edit Question
		&middot;
		<small>{!! link_to_route('admin.questions.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::questions.form', array('model' => $question))
	</div>

@stop
