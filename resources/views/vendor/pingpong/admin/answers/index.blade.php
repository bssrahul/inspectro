@extends($layout)

@section('content-header')
	<h1>
		All Answers ({!! $answers->count() !!})
		&middot;
		@if(!empty($qid))
		<small>{!! link_to_route('admin.answers.create', 'Add New',['question_id'=>$qid]) !!}</small>
		@else
		<small>{!! link_to_route('admin.answers.create', 'Add New') !!}</small>
		@endif
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Answer</th>
			<th>Question</th>
			<th>Next Question</th>
			<th>Custom Answer</th>
			
			
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($answers as $k=>$answer)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $answer->answers !!}</td>
				<td>{!! $answer->question->title !!}</td>
				<td>
					@if(!empty($answer->next_question_id) )
						{!! $answer->nextQuestion->title !!}
					@else
						<span class='label label-deactive '>Not Available</span>
					@endif
				</td>
				<td>@if($answer->custom_answer == '1')
							<span class='label label-active'>Allow</span>
					@else
					  <span class='label label-deactive '>Not Allow</span>
					@endif
				
				</td>
			
			
				<td>{!! date('F d, Y', strtotime($answer->created_at))  !!}</td>
				<td class="text-center">
					@if(!empty($qid))
						<a href="{!! route('admin.answers.edit', [$answer->id,'ques_id'=>$qid,'opt'=>$k]) !!}">Edit</a>
					@else
						<a href="{!! route('admin.answers.edit', [$answer->id,'opt'=>$k]) !!}">Edit</a>
					@endif
					
					&middot;
					@include('admin::partials.modal', ['data' => $answer, 'name' => 'answers'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($answers) !!}
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
</style>
@stop