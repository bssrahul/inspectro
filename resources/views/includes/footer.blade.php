<!--[Footer]-->
            	<footer class="foot-wrap">
                	<div class="container">
                    	<div class="row">
                        	<div class="foot-area">
                            	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                	<div class="foot-box">
                                    	<p class="fhead">Company</p>
                                        	<ul>
                                            <li><a href="#" title="">About</a></li>
                                            <li><a href="#" title="">Jobs</a></li>
                                            <li><a href="#" title=""> Team</a></li>
                                            <li><a href="#" title=""> Blog</a></li>
                                    </div>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                	<div class="foot-box">
                                    	<p class="fhead">Customers</p>
                                        	<ul>
                                            <li><a href="#" title="">How it works</a></li>
                                            <li><a href="#" title="">Safety</a></li>
                                            <li><a href="#" title="">iPhone app</a></li>
                                            <li><a href="#" title="">Services Near Me</a></li>
                                             <li><a href="#" title="">Cost Estimates</a></li>
                                              <li><a href="#" title="">Moving Guides</a></li>
                                    </div>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="foot-box">
                                    	<p class="fhead">Pros</p>
                                        	<ul>
                                            <li><a href="#" title="">How it works</a></li>
                                            <li><a href="#" title="">Sign up</a></li>
                                            <li><a href="#" title="">Pro center</a></li>
                                            <li><a href="#" title="">Success stories</a></li>
                                             <li><a href="#" title="">Mobile app</a></li>
                                        
                                </div>
                           
                                </div>
                            	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                	   <div class="foot-box">
                                    	<p class="fhead"> Questions? Need help?</p>
                                        	<ul>
                                            <li><a href="#" title="">Help center</a></li>
                                            <li><a href="#" title="">Contact Thumbtack</a></li>
                                            </ul>
                                            
                                            <p class="fhead"> Follow Us On</p>
                                        	<ul class="s-list">
                                            <li><a href="#" title="" class="fb"></a></li>
                                            <li><a href="#" title="" class="tw"></a></li>
                                            <li><a href="#" title="" class="gl"></a></li>
                                            <li><a href="#" title="" class="pn"></a></li>
                                            <li><a href="#" title="" class="is"></a></li>
                                            </ul>
                                            
                                            
                                          </div>
                                </div>                       
                            	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                </div>                                                                                                                                         
                            </div>
                        </div>
                        
                        <div class="copyright">
                        	<p>All Right Reserved - 2016  <a href="" title="Privacy policy ">Privacy policy</a> | <a href="" title="Terms of use ">Terms of use</a> </p>
                        </div>
                    </div>
                </footer>
            <!--[/Footer]-->

<!--[Welcome Popup]-->
	<div class="modal fade" id="myModal" role="dialog">
    
   </div> 
<!--[/Wecome Popup]-->

  

 <script>
var queArray = []; 
var quoteOptionsArr = new Array();
var CSRF_TOKEN = "<?php echo csrf_token(); ?>";		

		
$(document).ready(function(){
    $("#myBtn").click(function(){
		if($('.serviceList').hasClass('active')){
			$("#myModal").modal();
		}else{
			alert('Please select service to proceed.');return false;
		}
        
    });
});	

$(document).ready(function(){
	i=2;
	$("#myBtn"+i).click(function(){
	//console.log(i);
	$(".popup-foot").attr('id',i+1);
});
});	

$(document).ready(function(){
	
	
	
	popupValidation();
	$(".serviceList").click(function(){
		$('.serviceList').removeClass('active');
		$(this).addClass('active');
		queArray=[];
		
		var serviceId=$(this).attr('id');
		var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
		quoteOptionsArr['serviceId_'+serviceId] = new Array();

		$.ajax({
		url: '<?php echo url('/')."/serviceslist"; ?>',
		type: 'get',
		data: 'serviceId='+serviceId+'&_token='+CSRF_TOKEN,
		beforeSend: function( xhr ) {
				//$('body').append('<div id="loadering"><img src="'+loadingImage+'"></div>');
				//return false;
			},
		success: function (data) {
				$('#myModal').html(data);
		}
			});
		});

});	

$(document).on('click','.childbox',function(){
	
	$('.innerAns').hide();
	var nexQueId=$(this).data('next');
	$('.nextQue').attr('data-qid',nexQueId);
	popupValidation();
	
	if($('#email').is(':checked')){
		$('.for_email,.for_email_label').show();
		$('.for_phone,.for_phone_label').hide();
		$('.for_phone').val('');
	}
	if($('#email_text').is(':checked')){
		$('.for_email,.for_email_label').show();
		$('.for_phone,.for_phone_label').show();
	}
	var inputType1 = $('.for_email').attr('type');
	if(inputType1=='text')
	{
	if($('.for_email').is(':visible')=== true)
		{
			errorMsg('for_email','Email');
		}
	}
	var inputType2 = $('.for_email').attr('type');
	if(inputType2=='text')
	{
	if($('.for_phone').is(':visible')=== true)
		{
			errorMsg('for_phone','phone Number');
		}
	}

});
var selectOption = false;
var selectDateOption = false;
var Tellusflag = true;
var opId,dateOfServ,TellusData;
$(document).on('click','.nextQue,.back',function(){
	
	if (typeof $(this).data('qid') ==='undefined')
		{
			alert("Please choose Any Option");
			return;
		}else{
	var backQueId = $('.nextQue').data('current_id');
	
	var serviceId=$(this).data('serviceid');
	$('.innerAns').hide();
	
	var Qid=$(this).attr('data-qid');
	if (typeof(Storage) !== "undefined") {
	if($(this).hasClass('nextQue'))
	{
		
		var inputType = $('.childbox').attr('type');
	    var inputName = $('.childbox').attr('name');
		//alert(inputType);
		
		//alert(selectOption);
		if(((inputType=='checkbox' || inputType=='radio') &&  $('.childbox').is(':checked')) || ((inputType=='text' || inputType=='text') && $('.childbox').val().length > 0) || selectOption==true || selectDateOption==true || Tellusflag==true)
		{
			
			
			if($.inArray(backQueId,queArray)==-1)
			{
				
				queArray.push($.trim(backQueId));
				
			}
			
			var data={};
			var OptArray=[];
			if(selectOption==true)
			{
				//alert(opId);
				OptArray.push(parseInt(opId));
			}
			//alert(Tellusflag);
			if(Tellusflag==true)
			{
			
				TellusData=$('#TellUs').val();
				//alert("tell us"+TellusData);
				OptArray.push({'TellusData':TellusData});
			}
			
			if(selectDateOption==true)
			{
				if(opId=='selected_date')
				{
					dateOfServ = $('.for_date').val();
					//alert(dateOfServ);
					OptArray.push({'selected_date':dateOfServ});
				}
				else{
					OptArray.push({'serviceDate':opId});
				}
			}
			data.serviceId=serviceId;
			data.QId = backQueId;
			var $j_object=$('.childbox');
			$j_object.each( function(i) {	
			if(($(this).attr('type')=='checkbox') || ($(this).attr('type')=='radio')){
			if($(this).is(':checked'))
			{
				optionId=$(this).attr('value');	
				OptArray.push(parseInt(optionId));
			}}
			if($(this).attr('type')=='text'){
				var value=$.trim($(this).val());
				if(value.length>0)
				{
					var opName=$(this).attr('name');
					var opValue=$(this).attr('value');
					switch (opName) {
					case 'email':
						OptArray.push({email:value});
						break;
					case 'phone':
						OptArray.push({phone:value});
						break;
					case 'zip':
						OptArray.push({zip:value});
						break;
					case 'name':
						OptArray.push({name:value});
						break;
					case 'customAns':
						OptArray.push({customAns:value});
						
				}		
				}
			}
			});	
			data.options=OptArray;
			$.ajax({
			url: '<?php echo url('/')."/localstorage"; ?>',
			type: 'get',
			data: 'data='+JSON.stringify(data)+'&_token='+CSRF_TOKEN,
			success: function (RetData){   		
			}
			}); 
		}
		
		

	}
	} else {
    // Sorry! No Web Storage support..
	alert('your browser is out of date! Update It');
	}
	
	if(Qid==0 || Qid=='p2' || Qid=='p3'|| Qid=='p4' || Qid=='p5' || Qid=='p6')
	{
		stQfrontStorage(Qid);	
		return;
	}
	
	var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
	if(CheckArrayIndex(queArray,$.trim(Qid)) != -1 &&  CheckArrayIndex(queArray,$.trim(Qid))>0)
	{
		backQueIndex=CheckArrayIndex(queArray,$.trim(Qid))-1;
		backQueId=queArray[backQueIndex];
	}else if(CheckArrayIndex(queArray,$.trim(Qid))==0)
	{
		backQueId='undefined';
	}
	
	$.ajax({
		url: '<?php echo url('/')."/nextquestion"; ?>',
		type: 'get',
		data: 'serviceId='+serviceId+'&backQid='+backQueId+'&Qid='+Qid+'&_token='+CSRF_TOKEN,
		/* beforeSend: function( xhr ) {
				$('.inner-popup').append('<div id="loadering"><img src="'+loadingImage+'"></div>');
				//return false;
		},
		complete: function() {
			$("#loadering").remove();
		}, */
		success: function (data) {
		  // alert(data);    
				$('#myModal').html(data);
				popupValidation();
				//console.log(data);	
		}
	}); 
		}
	
});

$(document).ready(function() {
	
    $('body').on('click','.plist li',function(event) {
	   if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
    });
sendRequest();
cancelProject();

	
	$('body').on('click','.tellusData', function(){
		
		if($(this).hasClass('customInfoNo')){
			$('#TellUs').hide();
			$('#TellUs').val('');
			
			
		}else{
			
			$('#TellUs').show();
			
		}
		
	});
	
	/*if($('#customInfoYes').is(':checked'))
	{
		
		$('#TellUs').hide();
		Tellusflag = true;
	}
	if($('#customInfoNo').is(':checked'))
	{
		
		$('#TellUs').show();
		Tellusflag = true;
		$('#TellUs').val('');
	}*/


});
/**
  * Function to find the index of array
  *
  *
  **/
function CheckArrayIndex(customArray,valueForCheck) {
    var fruits = customArray;
    var a = fruits.indexOf(valueForCheck);
    return a;
}
/**
  * Function to validate the input field 
  *
  *
  **/
function popupValidation()
{
	
	$('.nextQue').prop('disabled',true);
	
	var inputType = $('.childbox').attr('type');
	var inputName = $('.childbox').attr('name');
	
	$('.drop-list').hide();
	ServdateTime();
	TellUs();
	$(document).on('change', '#selectTime', function() {
		ServdateTime();
	});
	
	
	if($('#selectAns').val()>0)
	{
		var nexQueId = $('option:selected', $('#selectAns')).data('next');
		console.log(nexQueId);
		setTimeout(function(){$('.nextQue').removeAttr('disabled')},300);
		$('.nextQue').attr('data-qid',nexQueId);
		backQueId = $('.nextQue').attr('data-current_id');
		opId = $('#selectAns').val();
		if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectOption=true;
				//alert(selectOption);
			}
			
	}
	
	$('#selectAns').change(function(){
		console.log(opId);
		var nexQueId = $('option:selected', this).data('next');console.log(nexQueId);
		$('.nextQue').attr('data-qid',nexQueId);
		backQueId = $('.nextQue').attr('data-current_id');
		opId = $(this).val();
		if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectOption=true;
				//alert(selectOption);
			}
			
		setTimeout(function(){$('.nextQue').removeAttr('disabled')},300);
	});
	
	if(((inputType=='checkbox') || (inputType=='radio')) && $('.childbox').is(':checked'))
	{
		//console.log('checked');
		var nexQueId = $('.childbox').data('next');
		$('.nextQue').attr('data-qid',nexQueId);
		setTimeout(function(){$('.nextQue').removeAttr('disabled')},300);
		
	}

	if(inputType=='text')
	{	
		if(inputName=='zip')
		{
			errorMsg('for_zip','zip Code');
		}
		if(inputName=='name')
		{
			
			errorMsg('childbox','name');
		}
	}
	
}
/**
  * Function to display the error
  *
  *
  **/
function errorMsg(inputClass,fieldName)
{
	
	if($("."+inputClass).val().length>0)
	{
		$('.nextQue').prop('disabled', false);
	}else{
		
		$('.nextQue').prop('disabled', true);
		//$('.nextQue').attr("disabled", 'disabled');
	}	
	$( "."+inputClass ).keyup(function(){
		
		if($("."+inputClass).val().length > 0)
		{
			$("."+inputClass).closest('.errorBox').html('');
			$('.nextQue').prop('disabled', false);
		}else{
			$("."+inputClass).closest('.errorBox').html('<div class="alert alert-danger">'+
			'<strong>Error!</strong> Please Enter '+fieldName+'</div>');
		    $('.nextQue').prop('disabled', true);	
		}
		});
}
/**
  * Function to display the hardcoded popup
  *
  *
  **/
function stQfrontStorage(staticModal)
{
	
	$.ajax({
		url: '<?php echo url('/')."/stQfrontStorage"; ?>',
		type: 'get',
		data: '_token='+CSRF_TOKEN+'&staticModal='+staticModal,
		success: function (data){
			$('#myModal').html(data);
			$( "#datepicker" ).datepicker();
			popupValidation();		
		}
	}); 
}

/**
  * Send the client request to admin
  *
  *
  **/

function sendRequest()
{
	$(document).on('click','#sendReq',function(){
		
		$.ajax({
		url: '<?php echo url('/')."/sendRequest"; ?>',
		type: 'get',
		data: '_token='+CSRF_TOKEN,
		success: function (data){
			
			console.log(data);
			//alert(data);
		}
	}); 
		
	});
	
}
/**
  *To cancel the client request
  *
  *
  **/
function cancelProject()
{
	$(document).on('click','#CancelProject',function(){
		$.ajax({
		url: '<?php echo url('/')."/cancelProject"; ?>',
		type: 'get',
		data: '_token='+CSRF_TOKEN,
		success: function (data){
			console.log(data);
		}
	}); 	
	});	
}

function ServdateTime()
{
	var selTimeVal = $('#selectTime').val();
	if(selTimeVal!='' && typeof selTimeVal !=='undefined')
	{
		var nexQueId = $('option:selected', $('#selectTime')).data('next');
		var val=$('#selectTime').val();
		if(val=='selected_date')
		{
			$('.drop-list').show();
			backQueId = $('.nextQue').attr('data-current_id');
			//opId = $(this).val();
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectDateOption=true;
				//alert(selectOption);
			}
			$('.nextQue').attr('data-qid',nexQueId);
			backQueId = $('.nextQue').attr('data-current_id');
			opId = val;
			
		}else if(val=='flexible_time' || val=='next_few_days' || val=='immediate')
		{
			backQueId = $('.nextQue').attr('data-current_id');
			//opId = $(this).val();
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectDateOption=true;
				//alert(selectOption);
			}
			$('.nextQue').attr('data-qid',nexQueId);
			backQueId = $('.nextQue').attr('data-current_id');
			opId = val;
		}
		
		setTimeout(function(){$('.nextQue').removeAttr('disabled')},300);
	}
	
	
	 
	
	
}
function TellUs()
	{
		var nexQueId = $('.nextQue').attr('data-qid');
		if($('#customInfoYes').is(':checked'))
		{
			backQueId = $('.nextQue').attr('data-current_id');
			//opId = $(this).val();
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				
				//alert(selectOption);
			}
			$('.nextQue').attr('data-qid',nexQueId);
			
		}
	if($('#customInfoNo').is(':checked'))
		{
			backQueId = $('.nextQue').attr('data-current_id');
			//opId = $(this).val();
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				
				//alert(selectOption);
			}
			$('.nextQue').attr('data-qid',nexQueId);
			TellusData = '';
		}
	}


</script>

<style>
.innerAns{display:none;}
.serviceList.active{
	opacity:0.6;
}
</style>