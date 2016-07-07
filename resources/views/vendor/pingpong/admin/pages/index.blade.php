@extends($layout)

@section('content-header')
	<h1>
		All pages ({!! $pages->count() !!})
		&middot;
		<small>{!! link_to_route('admin.pages.create', 'Add New',[  ]) !!}</small>
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		
		
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Bannar Image</th>
			<th>Page Title</th>
			<th>Page Heading</th>
			<th>Page Link</th>
			<th>Status</th>
			<th>Created At</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($pages as $page)
			<tr>
				<td>{!! $no !!}</td>
				<?php $destinationPath =  url().'/public/uploads/'; ?>
				<td ><img src="<?php echo $destinationPath."/".$page->bannar_image ; ?> " class="round_img" alt="Bannar Image"></td>
			
				<td>{!! $page->page_title !!}</td>
				<td class="td_wd">
					<?php 
						$string = strip_tags($page->page_heading);
						if (strlen($string) > 80) {
								$stringCut = substr($string, 0, 80);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
						}
						echo $string;
					?>
				</td>
				<td>{!! $page->page_link !!}</td>
				<td>@if($page->status == '1')
							<span class='label label-active'>Enable</span>
					@else
					  <span class='label label-deactive '>Disable</span>
					@endif
				
				</td>
				<td>{!! date('F d, Y', strtotime($page->created_at))  !!}</td>
				<td class="text-center">
					
					<?php $target = ['0'=>'1','1'=>'0'];?>
					<a title= "<?php echo($page->status == 0?'Activate status':'Deactivate Status') ?>" href="{{ URL::route('admin.pages.index', ['page_id'=>$page->id,'updateStatus'=>$target[$page->status]]) }}">
					 		<span class="fa fa-fw fa-check-square<?php echo($page->status ==0?'-o':'') ?>">  </span>
					</a>
				
					
					&middot;
					<a href="{!! route('admin.pages.edit', [$page->id,'ser_id' => $page->service_id]) !!}">Edit</a>
					&middot;
					@include('admin::partials.modal', ['data' => $page, 'name' => 'pages'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($pages) !!}
	</div>
@stop

@section('style')
<style>
.round_img{
	height:100px;
	width:150px;
	border-radius: 10px;
	border: 3px solid #e1e1e1;
}
.td_wd{
	width:20%;
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