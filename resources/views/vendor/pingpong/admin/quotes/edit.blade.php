@extends($layout)

@section('content-header')
	<h1>
		Edit Quote Request
		&middot;
			<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
			
	
		
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::quotes.form2', array('model' => $quotes))
	</div>

@stop





