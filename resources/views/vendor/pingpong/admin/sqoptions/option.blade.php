@extends($layout)

@section('content-header')
	<h1>
		<?php if(empty($quesId)){ ?>
			All Question Option 
		<?php }?>({!! $categories->count() !!})
		&middot;
		<small>{!! link_to_route('admin.sqoptions.create', 'Add New') !!}</small>
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			
			<th>Question</th>
			
			
		</thead>
		<tbody>

			@foreach ($categories as $category)
			<tr>
				
				<td>{!! $category->question[0]->title !!}</td>
				<!--<td>	<?php  $jsondata=$category->options;	$optionArr=json_decode($jsondata);
						$option=""; $status="";
						foreach($optionArr as $optionData){
							echo	$option=$optionData->option."	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "; 
							$status=$optionData->status;
							if($status == 0){
							 		echo "<span class='label label-active'>Active</span>"; 
							}else{
									echo "<span class='label label-deactive '>Deactive</span>";
							};
							echo "</br></br>";
						}

				?>
						
						
				</td>
				<td>{!! $category->option_type !!}</td>-->
				<td>@if($category->status == '1')
							<span class='label label-active'>Active</span>
					@else
					  <span class='label label-deactive '>Deactive</span>
					@endif
				
				</td>
				<td>{!! date('F d, Y', strtotime($category->created_at))  !!}</td >
				
				
				
				
				
			</tr>
			
			@endforeach
			
		</tbody>
	</table>

	</br></br></br>
	
	<table class="table">
		<thead>
			
			<th>Options</th>
			<th class="text-center" colspan="2">
					<a href="{!! route('admin.sqoptions.edit', $category->id) !!}">Edit</a>
					
					&middot;
					@include('admin::partials.modal', ['data' => $category, 'name' => 'sqoptions'])<span> ( All Option Delete ) </span>
			</th>
			
		</thead>
		<tbody>
	
			@foreach ($categories as $category)
			<tr>
				
			
					<?php  $jsondata=$category->options;	$optionArr=json_decode($jsondata);
						$option=""; $status="";
						foreach($optionArr as $k=>$optionData){
							echo"<tr><td>";
							echo	$option=$optionData->option."	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "; 
							
								$status=$optionData->status;
								echo"</td><td>";
							if($status == 0){
							 		echo "<span class='label label-active'>Active</span>"; 
							}else{
									echo "<span class='label label-deactive '>Deactive</span>";
							};
							echo"</td><td>";?>
								<a href="{!! route('admin.sqoptions.edit', [$category->id,'opt'=>$k]) !!}">Edit</a>
					
								
							
							<?php echo"</td></tr>";
							//echo "</br></br>";
						}

				?>
						
						
				
				
				
				
				
				
				
			</tr>
			
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