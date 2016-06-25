@extends($layout)

@section('content-header')
	<h1>
		Add New Question
		&middot;
		<small>{!! link_to_route('admin.questions.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::questions.form')
	</div>

@stop
