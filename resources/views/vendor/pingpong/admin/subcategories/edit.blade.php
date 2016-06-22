@extends($layout)

@section('content-header')
	<h1>
		Edit
		&middot;
		<small>{!! link_to_route('admin.subcategories.index', 'Back') !!}</small>
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::subcategories.form', array('model' => $subcategory))
	</div>

@stop
