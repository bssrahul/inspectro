@extends($layout)

@section('content-header')
	<h1>
		All Subcategories ({!! $subcategories->count() !!})
		&middot;
		<small>{!! link_to_route('admin.subcategories.create', 'Add New') !!}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Categories</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($subcategories as $category)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $category->category_id !!}</td>
				<td>{!! $category->title !!}</td>
				<td>{!! $category->description !!}</td>
				<td>{!! $category->status !!}</td>
				<td>{!! $category->created_at !!}</td>
				<td class="text-center">
					<a href="{!! route('admin.categories.edit', $category->id) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'subcategories'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($subcategories) !!}
	</div>
@stop
