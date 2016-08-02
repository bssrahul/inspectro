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
	<?php if(empty($request_id)){?>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Full Name</th>
			<th>Contact Mode</th>
			<th>Zip Code</th>
			<th>Request Date</th>
			<th>Service Delivary On</th>
			<th>Offer Status</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($quotes as $k=>$quote)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $quote->full_name !!}</td>
				<td>{!! $quote->email !!}  @if(!empty($quote->phone_no)) /  {!! $quote->phone_no !!} @endif</td>
				<td>{!! $quote->zipcode !!}</td>
				<td>{!! date('F d, Y', strtotime($quote->created_at))  !!}</td>
				<td>					
					<?php 
					if (ctype_digit($quote->service_request_date)) {
						echo date('F d, Y', strtotime($quote->service_request_date));
					} else {
						echo ucfirst($quote->service_request_date);
					}
					?>
				</td>
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
				
					{!! link_to_route('admin.quotes.index', 'View Request', ['reqid'=>$quote->id]) !!}
				<!--	<button type="button"  data-rel="<?php echo $quote->id; ?>" data-toggle="modal" data-target="#myModal">
						View Request
					</button> -->
				
					&middot;
					<a href="{!! route('admin.quotes.edit', $quote->id) !!}">Edit</a>
					@include('admin::partials.modal', ['data' => $quote, 'name' => 'quotes'])
				</td>
			</tr>
			<?php $no++ ;?>
			@endforeach
		</tbody>
	</table>
	<?php }else{ ?>
		
		<table class="table_info">
		<thead >
				@foreach ($quotes as $k=>$quote)
		<?php if($status == 0){?>
		<div >
				<a href="{!! route('admin.quotes.create', ['requestId'=>$quote->id]) !!}"><input type="submit" name="reply" value="Send a Request Reply" class="reply_btn" id="send"></a>
				
		</div> 
		<?php } ?>
		<?php if($status == 1){?>
		<div >
				<a href="{!! route('admin.quotes.index', ['com_req_Id'=>$quote->id]) !!}"><input type="submit" name="complete" value="Service Complete" class="reply_btn" id="complete"></a>
				
		</div> 
		<?php } ?>
		<tr class="mid">
							
				 	  <td colspan="2"> Personal Information :</td>
		</tr>
		<tr>
			<td><label> Name :</label></td><td>{!! $quote->full_name !!}</td>
		</tr>
		<tr>
			<td><label>Zip Code</label></td><td>{!! $quote->zipcode !!}</td>
		</tr>
		<tr>
			<td><label> Contact Detail :</label></td><td >{!! $quote->email !!}    @if(!empty($quote->phone_no)) / {!! $quote->phone_no !!} @endif </td>
		
		</tr>
		<tr>
			@if(!empty($quote->service['title']))
			<td><label> Selected Service  :</label></td><td >{!! $quote->service['title'] !!}</td>
			@endif
		</tr>
		<tr>
			<td><label> Apply Date :</label></td><td >{!! date('F d, Y', strtotime($quote->created_at))  !!}</td>
		
		</tr>
		<tr>
			<td><label> Service Request Date :</label></td><td ><?php 
					if (ctype_digit(strtotime($quote->service_request_date))) {
						echo date('F d, Y', strtotime($quote->service_request_date));
					} else {
						echo ucfirst($quote->service_request_date);
					}
					?></td>
		
		</tr>
		
		<tr> </tr>
		<tr>
			<td colspan="2">	
			<table class="table">
				<thead class="thead-default">
				<?php //echo "<pre>"; print_r($tempQue);die;?>
				<?php foreach($tempQue as $k=>$tempQueData){
						$k=$k+1;?>
				<tr class="mid">
							
				 	  <td class="td" ><?php echo "Que ".$k.".  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tempQueData['question_id'];?></td>
					  
				 	 
				 	 
					
					  
				</tr>
					<?php 
							 foreach($tempQueData['answer_id'] as $z=> $answerData){
							
								?><tr> 
									<td class="td" >
										<?php echo "<b>Ans:</b>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$answerData;?>
									</td>
									<?php if(isset($tempQueData['custom_answer'][$z])){?>
									<td class="td" >
									<?php echo "<b>Custom Ans:</b>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tempQueData['custom_answer'][$z];?></td>
									<?php } ?>
									</tr><?php
							 }
					 } ?>	
					 
					  <?php if(!empty($quote->anything_else_know)){?>
					  <tr class="mid">
						   <td class="td" ><?php echo "Que ".++$k.".  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Anything else We should know?";?></td>
						</tr>
						<tr> 
									<td class="td" >
										<?php echo "<b>Ans:</b>.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$quote->anything_else_know;?>
									</td>
						</tr>
					 <?php }?>
				</thead>
				
			</table>
				</td>
		</tr>
				</thead>
		
			@endforeach
	</table>
	
	
	
	<?php } ?>
	<div class="text-center">
		{!! pagination_links($quotes) !!}
	</div>
	
	
	
@stop

@section('style')
<style>
.reply_btn{
	height:50px;
	width:20%;
	float:right;
	margin:0 5% 2% 0;
	color:#ecf0f1;
	text-decoration:none;
	border-radius:5px;
	border:solid 1px #f39c12;
	background:#e67e22;
	text-align:center;
	-webkit-transition: all 0.1s;
	 -moz-transition: all 0.1s;
	 transition: all 0.1s;
	 
	 -webkit-box-shadow: 0px 6px 0px #d35400;
	 -moz-box-shadow: 0px 6px 0px #d35400;
	 box-shadow: 0px 6px 0px #d35400;
	
}

.td{
	float:left;
	width:34%;
}
.table_info{
	
	width:90%;
	border:3px solid #165489;
	text-align:center;
	margin: 5% 5%;
	padding:50px;
}
td label{
	float:left;
	margin: 3% 10%;
	color:#331a00;
	font-size:16px;
}
.mid{
	//float:left;
	//padding-left:10px;
	//left:0px;
	font-weight:bold;
	background-color:#165489;
	color:#fff;
	font-size:16px;
	width:100%;
	height:35px;
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
