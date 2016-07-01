@extends($layout)

@section('content-header')
	<h1>
		All Quote Request ({!! $quotes->count() !!})
		&middot;
		
		
	
		<small><input action="action" type="button" value="Back" onclick="history.go(-1);" /></small>
		
	<!--	<small class="searchBox">	<input  type="text" name="search" id="search" class = 'form-control searchBox'  /></small><label class="searchLabel" > Search </label> -->
	</h1>
@stop

@section('content')

	<table class="table">
		<thead>
			<th>No</th>
			<th>Full Name</th>
			<th>Contact Mode</th>
			<th>Zip Code</th>
			<th>Request Date</th>
			<th>Service Request Date</th>
			<th>Status</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($quotes as $k=>$quote)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $quote->full_name !!}</td>
				<td>{!! $quote->contact_mode !!}</td>
				<td>{!! $quote->zipcode !!}</td>
				<td>{!! date('F d, Y', strtotime($quote->created_at))  !!}</td>
				<td>{!! date('F d, Y', strtotime($quote->service_request_date))  !!}</td>
				<td>
					@if($quote->status == 0)
						<span class='label label-new'>New</span>
					@elseif($quote->status == 1)
					  <span class='label label-deactive '>Pending</span>
					@else
					  <span class='label label-active '>Complete</span>
					@endif
				
				</td>
				</td>
	
				<td class="text-center">
				
					{!! link_to_route('admin.quotes.show', 'View Request', ['reqId'=>$quote->id]) !!}
				<!--	<button type="button"  data-rel="<?php echo $quote->id; ?>" data-toggle="modal" data-target="#myModal">
						View Request
					</button> -->
				
					&middot;
					@include('admin::partials.modal', ['data' => $quote, 'name' => 'quotes'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! pagination_links($quotes) !!}
	</div>
	
	
	<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Quote Request Information</h4>
				  </div>
				  <div class="modal-body" >
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary">Send Reply</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
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
.label-new {
    background-color: #66b3ff !important;
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
			
			 $("#myBtn").click(function(){
        $("#myModal").modal();
    });
	</script>
	
	
@stop
