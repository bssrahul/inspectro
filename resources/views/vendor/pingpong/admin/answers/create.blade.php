@extends($layout)

@section('content-header')
	<h1>
		Add New Question
		&middot;
		<small>{!! link_to_route('admin.answers.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::answers.form')
	</div>

@stop
