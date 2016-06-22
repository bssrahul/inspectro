@extends($layout)

@section('content-header')
	<h1>
		All sub category option ({!! $categories->count() !!})
		&middot;
		<small>{!! link_to_route('admin.sqoptions.create', 'Add New') !!}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Question</th>
			<th>Status</th>
			<th>Created Date</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
<?php //echo '<pre>';print_r($categories);exit; ?>
			@foreach ($categories as $category)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $category->question[0]->title !!}</td>
				
				<td>@if($category->status == '1')
							<span class='label label-active'>Active</span>
					@else
					  <span class='label label-deactive '>Deactive</span>
					@endif
				
				</td>
				<td>{!! date('F d, Y', strtotime($category->created_at))  !!}</td >
				
				
				
				<td class="text-center">
					<a href="{!! route('admin.sqoptions.edit', $category->id) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'sqoptions'])
				</td>
				<td class="text-center">
					{!! link_to_route('admin.sqoptions.index', 'View Options', [ 'ques_id' =>$category->service_question_id ]) !!}
					
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($categories) !!}
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
</style>
@stop