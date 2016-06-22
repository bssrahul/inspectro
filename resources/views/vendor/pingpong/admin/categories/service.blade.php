@extends($layout)

@section('content-header')
	<h1>
		All Services ({!! count($services) !!})
		&middot;
		<small>
		<a href="../servicecreate/<?php echo $id ; ?>">Add New</a></small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		
		</thead>
		<tbody>
			@foreach ($services as	$k => $category)
			<tr>
				<td>{!! $k !!}</td>
				<td>{!! $category->title !!}</td>
				<td>{!! $category->description !!}</td>
				<td>{!! $category->status !!}</td>
				<td>{!! $category->created_at !!}</td>
				<td class="text-center">
			
					<a href="{!! route('admin.categories.edit', $category->id) !!}">Edit</a>
					&middot;
				
				</td>
				<td class="text-center">
					<a href="{!! route('admin.categories.index', $category->id) !!}">View Services</a>
				</td>	
					
				
			</tr>
			
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($services) !!}
	</div>
@stop
