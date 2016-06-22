@extends($layout)

@section('content-header')
	<h1>
		Add New
		&middot;
		<small>{!! link_to_route('admin.categories.service', 'Back') !!}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::categories.serviceform')
	</div>

@stop
