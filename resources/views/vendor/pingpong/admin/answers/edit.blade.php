@extends($layout)

@section('content-header')
	<h1>
		Edit Answer
		&middot;
			<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
			
	
		<small style="float:right">	
			{!! link_to_route('admin.login.index', 'Home') !!}&nbsp;&nbsp;>>&nbsp;&nbsp;{!! link_to_route('admin.questions.index', ucwords(substr( $selectedServiceName[$serviceid],0, 25)),['ser_id'=>$serviceid,'opt'=>$serviceid]) !!}
			&nbsp;&nbsp;>>&nbsp;&nbsp; {!! link_to_route('admin.answers.index', ucwords(substr($selectedQuestionName[$qid] ,0, 25)),['ques_id' => $qid , 'serv_id'=> $serviceid ]) !!}

		</small>
	</h1>
@stop

@section('content')
	
	<div>
		@include('admin::answers.form', array('model' => $answer))
	</div>

@stop





