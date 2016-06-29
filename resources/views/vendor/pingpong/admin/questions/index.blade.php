@extends($layout)

@section('content-header')
	<h1>
		All Questions ({!! $questions->count() !!})
		&middot;
		<small>{!! link_to_route('admin.questions.create', 'Add New',[ 'serv_id'=> $serviceid,'opt'=> $optId ]) !!}</small>
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		
		<small class="searchBox">	
			{!! link_to_route('admin.login.index', 'Home') !!}&nbsp;&nbsp;>>&nbsp;&nbsp;{!! link_to_route('admin.questions.index', ucwords($selectedServiceName[$serviceid]),['ser_id'=>$serviceid,'opt'=>$serviceid]) !!}
		</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th>Other Input Field</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($questions as $question)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $question->title !!}</td>
				<td>{!! $question->description_1 !!}</td>
				<td>@if($question->other_custom_field == '1')
							<span class='label label-active'>Enable</span>
					@else
					  <span class='label label-deactive '>Disable</span>
					@endif
				
				</td>
				<td>{!! date('F d, Y', strtotime($question->created_at))  !!}</td>
				<td class="text-center">
				
					@if($question->avail == 1 )
							{!! link_to_route('admin.answers.index', 'View Answers', [ 'ques_id' =>$question->id,'serv_id'=>$serviceid ]) !!}
					@else
							{!! link_to_route('admin.answers.create', 'Add Answers', [ 'que_id' =>$question->id,'opt'=>$question->id,'serv_id'=>$serviceid ]) !!}
					@endif
					&middot;
					<a href="{!! route('admin.questions.edit', [$question->id,'ser_id' => $question->service_id]) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $question, 'name' => 'questions'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($questions) !!}
	</div>
@stop

@section('style')
<style>
.active{
	color:green;
}
.deactive{
	color:red;
}
.label-deactive {
    background-color: #f56954 !important;
}
.label-active {
    background-color: #5cb85c;
}
.label {
    border-radius: 0.25em;
    color: #fff;
    display: inline;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    padding: 0.2em 0.6em 0.3em;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap;
	
}
.searchBox{
	float:right;
	margin-right:5%;
	
}
.searchLabel{
	float:right;
	margin-right:3%;
	font:10px !important;
	color: lightblue !important;
	font-style: oblique;
}
</style>
@stop