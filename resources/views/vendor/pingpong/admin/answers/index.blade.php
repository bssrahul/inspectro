@extends($layout)

@section('content-header')
	<h1>
		All Answers ({!! $answers->count() !!})
		&middot;
		@if(!empty($qid))
		<small>{!! link_to_route('admin.answers.create', 'Add New',['question_id'=>$qid,'opt'=>$qid,'serv_id'=>$serviceid]) !!}</small>
		@else
		<small>{!! link_to_route('admin.answers.create', 'Add New') !!}</small>
		@endif
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		<small class="searchBox">	
			{!! link_to_route('admin.login.index', 'Home') !!}&nbsp;&nbsp;>>&nbsp;&nbsp;{!! link_to_route('admin.questions.index', ucwords(substr( $selectedServiceName[$serviceid],0, 25)),['ser_id'=>$serviceid,'opt'=>$serviceid]) !!}
			&nbsp;&nbsp;>>&nbsp;&nbsp; {!! link_to_route('admin.answers.index', ucwords(substr($selectedQuestionName[$qid] ,0, 25)),['ques_id' => $qid , 'serv_id'=> $serviceid ]) !!}

		</small>
	<!--	<small class="searchBox">	<input  type="text" name="search" id="search" class = 'form-control searchBox'  /></small><label class="searchLabel" > Search </label> -->
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Answer</th>
			<th>Short Answer Name </th>
			<th>Question</th>
			<th>Option Description</th>
			<th>Next Question</th>
			<th>Custom Answer</th>
			
			
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($answers as $k=>$answer)
			<tr>
				<td>{!! $no !!}</td>
				<td>
					<?php 	$string = strip_tags(@$answer->answers);
					 if (strlen($string) > 25) {
						 $string = substr($string, 0, 25).'...';
						
					} 
					echo $string;?>
				
				</td>
				<td>
					<?php 	$string = strip_tags(@$answer->short_name);
					 if (strlen($string) > 25) {
						 $string = substr($string, 0, 25).'...';
						
					} 
					echo $string;?>
				
				</td>
				<td>
				<?php 	$string = strip_tags(@$answer->question->title);
					 if (strlen($string) > 25) {
						 $string = substr($string, 0, 25).'...';
						
					} 
					echo $string;?>
				</td>
				<td>
					@if(!empty($answer->option_description) )
						<?php 	$string = strip_tags(@$answer->option_description);
						 if (strlen($string) > 25) {
							 $string = substr($string, 0, 25).'...';
							
						} 
						echo $string;?>
						
					@else
						<span class='label label-deactive '>Not Available</span>
					@endif
				
				</td>
				<td>
						@if($answer->next_question_id == 0)
							<span class='label label-end '>End Questionaire</span>
						@else 
							@if(!empty($answer->next_question_id))
								{!! $answer->nextQuestion->title !!}
							@else 
								<span class='label label-deactive '>Not Available</span>
							@endif
						@endif
					
				</td>
				<td>@if($answer->custom_answer == 'text')
							<span class='label label-active'>Input Text</span>
					@elseif($answer->custom_answer == 'date')
							<span class='label label-date'>Input Date</span>
					@else
					  <span class='label label-deactive '>Not Allow</span>
					@endif
				
				</td>
			
			
				<td>{!! date('F d, Y', strtotime($answer->created_at))  !!}</td>
				<td class="text-center">
					@if(!empty($qid))
						<a href="{!! route('admin.answers.edit', [$answer->id,'ques_id'=>$qid,'opt'=>$k,'serv_id'=>$serviceid,'hd'=>$k]) !!}">Edit</a>
					@else
						<a href="{!! route('admin.answers.edit', [$answer->id,'opt'=>$k,'serv_id'=>$serviceid]) !!}">Edit</a>
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
.label-end{
	 background-color: #000;
	 color:#fff;
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
.label-date {
    background-color: #660000;
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


@section('script')


	<script type="text/javascript">
			/* $(document).ready(function() {
				//alert('hello');
				$('#search').keyup(function(){
					var data=document.getElementById('search').value;
					alert(data);
						$.ajax({
							dataType: "data",
							url: '/search_results',
							data: {keyword: $('#your-field').value()},
							success: function (result) {
								// update your page with the result json
								console.log(result);
							},
						});
				});
	
				
				
				
			}); */
	</script>
	
	
@stop
