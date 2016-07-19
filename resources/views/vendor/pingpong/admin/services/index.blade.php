@extends($layout)

@section('content-header')
	<h1>
		All Services ({!! $services->count() !!})
		&middot;
		<small>{!! link_to_route('admin.services.create', 'Add New') !!}</small>
		<small class="searchBox">	
			{!! link_to_route('admin.login.index', 'Home') !!}
		</small>
	</h1>
	
@stop

@section('content')
	
	<table class="table">
		<thead>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th>Created At</th>
			<th>Status</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($services as $category)
			<tr>
				<td>{!! $no !!}</td>
				<td>
				<?php 	$string = strip_tags(@$category->title);
					 if (strlen($string) > 25) {
						
						 $string = substr($string, 0, 25).'...';
						// echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					} 
					echo $string;?>
				</td>
				<td>
					<?php 	$string = strip_tags(@$category->description);
					 if (strlen($string) > 25) {
						 $string = substr($string, 0, 25).'...';
						 //$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					} 
					echo $string;?></td>
				<td>{!! date('F d, Y', strtotime($category->created_at))  !!}</td>
				<td>@if($category->status == '1')
							<span class='label label-active'>Active</span>
					@else
					  <span class='label label-deactive '>Deactive</span>
					@endif
				
				</td>
				<?php $target = ['0'=>'1','1'=>'0'];?>
				<td class="text-center">
				
					
				
							
					@if($category->avail == 1 )
							{!! link_to_route('admin.questions.index', 'View Questions', [ 'ser_id' =>$category->id,'opt'=>$category->id ]) !!}
					@else
							{!! link_to_route('admin.questions.create', 'Add Questions', [ 'serv_id' =>$category->id,'opt'=>$category->id ]) !!}
					@endif
					&middot;
					
					<a href="{!! route('admin.services.edit', $category->id) !!}">Edit</a>
					&middot;
					<a title= "<?php echo($category->status == 0?'Activate status':'Deactivate Status') ?>" href="{{ URL::route('admin.services.index', ['service_id'=>$category->id,'updateStatus'=>$target[$category->status]]) }}">
					 
					<span class="fa fa-fw fa-check-square<?php echo($category->status ==0?'-o':'') ?>">  </span>
				</a>
				&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'services'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($services) !!}
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
	font-size: 20px;
	color: lightblue !important;
	font-style: oblique;
}
</style>
@stop

@section('script')
	
	<script type="text/javascript">
			$(document).ready(function() {
					
					$("#search").keyup(function(){
							$searchData=$('#search').val();
							alert($searchData);
					});
					
			});
	</script>
@stop