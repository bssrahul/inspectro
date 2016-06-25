@extends($layout)

@section('content-header')
	<h1>
		Add New
		&middot;
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::sqoptions.form')
	</div>

@stop
