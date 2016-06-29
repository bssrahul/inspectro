@extends($layout)

@section('content-header')
	<h1>
		Add New
		&middot;
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		<small style="float:right">	
			{!! link_to_route('admin.login.index', 'Home') !!}&nbsp;&nbsp;>>&nbsp;&nbsp;{!! link_to_route('admin.services.index', 'Service') !!}
		</small>
	</h1>
@stop

@section('content')

	<div>
		@include('admin::services.form')
	</div>

@stop
