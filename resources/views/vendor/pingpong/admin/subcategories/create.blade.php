@extends($layout)

@section('content-header')
	<h1>
		Add New
		&middot;
		<small>{!! link_to_route('admin.subcategories.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::subcategories.form')
	</div>

@stop
