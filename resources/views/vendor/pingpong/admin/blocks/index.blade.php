@extends($layout)

@section('content-header')
	<h1>
		All blocks ({!! $blocks->count() !!})
		&middot;
		<small>{!! link_to_route('admin.blocks.create', 'Add New',[  ]) !!}</small>
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		
		
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Image</th>
			<th>Type</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($blocks as $block)
			<tr>
				<td>{!! $no !!}</td>
				<?php $destinationPath =  url().'/uploads/'; ?>
				<td ><img src="<?php echo $destinationPath."/".$block->image ; ?> " class="round_img" alt="Bannar Image"></td>
				<td>@if( $block->type == 'process' )
						{!! 'How does it Work' !!}
					@elseif( $block->type == 'services' )
						{!! 'We are here to Serve You' !!}
					@elseif( $block->type == 'features' )
						{!! 'Our Features' !!}
					@elseif( $block->type == 'testimonial' )
						{!! 'Testimonial' !!}
					@elseif( $block->type == 'work' )
						{!! 'Work' !!}
					@endif
				</td>
				<td>{!! $block->title !!}</td>
				<td>
					<?php 
						$string = strip_tags($block->description);
						if (strlen($string) > 80) {
								$stringCut = substr($string, 0, 80);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						}
						echo $string;
					?>
				</td>
			
				<td>@if($block->status == '1')
							<span class='label label-active'>Active</span>
					@else
					  <span class='label label-deactive '>Deactive</span>
					@endif
				
				</td>
				<td>{!! date('F d, Y', strtotime($block->created_at))  !!}</td>
				<td class="text-center">
					
					<?php $target = ['0'=>'1','1'=>'0'];?>
					<a title= "<?php echo($block->status == 0?'Activate status':'Deactivate Status') ?>" href="{{ URL::route('admin.blocks.index', ['block_id'=>$block->id,'updateStatus'=>$target[$block->status]]) }}">
					 		<span class="fa fa-fw fa-check-square<?php echo($block->status ==0?'-o':'') ?>">  </span>
					</a>
				
					
					&middot;
					<a href="{!! route('admin.blocks.edit', [$block->id,'ser_id' => $block->service_id]) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $block, 'name' => 'blocks'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($blocks) !!}
	</div>
@stop

@section('style')
<style>
.round_img {
	height:100px;
	width:150px;
	border-radius: 10px;
	border: 3px solid #e1e1e1;
	background-color:#e1e1e1;
}

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