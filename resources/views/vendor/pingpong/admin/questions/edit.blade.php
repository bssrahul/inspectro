@extends($layout)

@section('content-header')
	<h1>
		Edit Question
		&middot;
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		<small style="float:right">	

			{!! link_to_route('admin.login.index', 'Home') !!}&nbsp;&nbsp;>>&nbsp;&nbsp;{!! link_to_route('admin.questions.index', ucwords(substr($selectedServiceName[$serviceid],0,20)),['ser_id'=>$serviceid,'opt'=>$serviceid]) !!}

		</small>
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::questions.form', array('model' => $question))
	</div>

@stop
