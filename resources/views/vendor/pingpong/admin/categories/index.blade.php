@extends($layout)

@section('content-header')
	<h1>
		All  <?php if((!empty($pid)) && (empty($sid))){
						$id=$pid;
						$type='service';
						echo "Services";
						
				}
				elseif((empty($pid)) && (!empty($sid))){
						$id=$sid;
						$type='question';
						echo "Questions";
					
				}else{
						$id=0;
						$type='category';
						echo "Categories";
					}
		?>({!! $categories->count() !!})
		&middot;
		
		<?php 
		if((strval($sertype) != 'service') && (empty($sertype))) {?>
		<small>{!! link_to_route('admin.categories.create', 'Add New',['id'=>$id,'type' => $type]) !!}	</small>
		<?php } ?>
			
		 <?php if((!empty($pid)) && (empty($sid) && (strval($sertype) != 'service'))){
				echo "<small><input action='action' type='button' value='Back' onclick='history.go(-1);' /></small>";
			}
			elseif((empty($pid)) && (!empty($sid)  )){
					echo "<small><input action='action' type='button' value='Back' onclick='history.go(-1);' /></small>";
			}?>
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
			@foreach ($categories as $category)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $category->title !!}</td>
				<td>{!! $category->description !!}</td>
				<td>@if($category->status == '1')
							<span class='label label-active'>Active</span>
					@else
					  <span class='label label-deactive '>Deactive</span>
					@endif
				
				</td>
				<td>{!! $category->created_at !!}</td>
				<td class="text-center">
					<?php  if((!empty($pid)) && (empty($sid))){?>
					
						{!! link_to_route('admin.categories.index', 'View Question', [ 's_id' =>$category->id ]) !!}
					
					<?php  }elseif(empty($sid)){ ?>
				
						
							{!! link_to_route('admin.categories.index', 'View Services', [ 'p_id' =>$category->id ]) !!}
						
					<?php }?>
					&middot;
					
					<a href="{!! route('admin.categories.edit', [$category->id,'type' => $type]) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'categories'])
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