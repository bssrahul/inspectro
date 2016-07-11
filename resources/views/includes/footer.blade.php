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
	
	
	if($(this).hasClass('for_zip') || $(this).hasClass('for_email') || $(this).hasClass('for_phone') || $(this).hasClass('name')){
		return false;
	}
	
	$('.innerAns').hide();
	var nexQueId=$(this).data('next');
	$('.nextQue').attr('data-qid',nexQueId);
	
	$('.customAnswerText').removeClass('required');
	if($(this).hasClass('customAnswer')){
		$(this).parent().next('.customAnswerText').addClass('required');
	}
	
	
	
	
	if($('#email').is(':checked')){
		$('.for_email,.for_email_label').show();
		$('.for_phone,.for_phone_label').hide();
		$('.for_phone').val('');
	}
	if($('#email_text').is(':checked')){
		$('.for_email,.for_email_label').show();
		$('.for_phone,.for_phone_label').show();
	}
	if(!$(this).hasClass('emailCheck')){
		popupValidation();
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
var Tellusflag = false;
var opId,dateOfServ;
var TellusData = '';
$(document).on('click','.nextQue,.back',function(){
	
	if (typeof $(this).data('qid') ==='undefined') {
		alert("Please choose Any Option");
		return;
	}else {
		
		var customAnswer = 0;	
		var customAnsObj = '';
		
		$('.customAnswer').each(function(){
			if($(this).is(':checked')){
				customAnswer = 1;
				customAnsObj = $(this);
			}
		});	
			
		var backQueId = $('.nextQue').data('current_id');
		var serviceId=$(this).data('serviceid');
		$('.innerAns').hide();
		var Qid=$(this).attr('data-qid');
		if (typeof(Storage) !== "undefined") {
			if($(this).hasClass('nextQue')) {
			
			var inputType = $('.childbox').attr('type');
			var inputName = $('.childbox').attr('name');
			
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
					OptArray.push(parseInt(opId));
					selectOption = false;
				}
				if(Tellusflag==true)
				{
					TellusData=$('#TellUs').val();
					OptArray.push({'TellusData':TellusData});
					
					Tellusflag = false;
				}

				if(selectDateOption==true)
				{
					if(opId=='selected_date')
					{
						dateOfServ = $('.for_date').val();
						OptArray.push({'selected_date':dateOfServ});
						selectDateOption=false;
					}
					else{
						console.log(opId);
						OptArray.push({'serviceDate':opId});
						selectDateOption=false;
					}
				}
				data.serviceId=serviceId;
				data.QId = backQueId;
				var $j_object=$('.childbox');
				$j_object.each( function(i) {	
				if(($(this).attr('type')=='checkbox') || ($(this).attr('type')=='radio')){
				
				
				if($(this).is(':checked') && customAnswer=='0' && ($(this).attr('type')=='radio'))
				{
					optionId=$(this).attr('value');	
					OptArray.push(parseInt(optionId));
				}
				
				if($(this).is(':checked') && ($(this).attr('type')=='checkbox')) {
					optionId=$(this).attr('value');	
					
					if(!$(this).parent().next().hasClass('customAnswerText')){
						OptArray.push(parseInt(optionId));
					}
				}
			
				}
	
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
				
				if(customAnswer=='1')
				{
					if(customAnsObj.parent().next('input[type=text]').val()!=''){
						OptArray.push({'answerId':parseInt(customAnsObj.val()),'customAnswer':customAnsObj.parent().next('input[type=text]').val()});
					}
				}
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
			popupValidation();
			$.ajax({
					url: '<?php echo url('/')."/nextquestion"; ?>',
					type: 'get',
					data: 'serviceId='+serviceId+'&backQid='+backQueId+'&Qid='+Qid+'&_token='+CSRF_TOKEN,
					success: function (data) {
						$('#myModal').html(data);
						popupValidation();
					}
				}); 
	}
	
});

$(document).ready(function() {
	
    $('body').on('click','.plist li.actionPerform',function(event) {
	   if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
		popupValidation();
    });
	sendRequest();
	cancelProject();
	
	$('body').on('click','.tellusData', function(){
		
		if($(this).hasClass('customInfoNo')){
			$('#TellUs').hide();
			$('#TellUs').val('');
			Tellusflag=false;
		}else{
			$('#TellUs').show();
			Tellusflag=true;
		}
		
	});
	
	$('body').on('keyup','.customAnswerText', function(){
		if($(this).val()!=''){
			$(this).removeClass('required');
		}else{
			
			$(this).addClass('required');
		}
		popupValidation();
	});
	
	$('body').on('keyup','#TellUs', function(){
		popupValidation();
	});
	$('body').on('keyup','#fullName', function(){
		errorMsg('childbox','name');
	});
	
	
	
	

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
	
	
	$('.error-box').hide();
	$('.error-box').html('<p></p>');
	
	/*Code to validate option with custome answer*/
	var messageErr = '';
	
	$('.customAnswerText.required').each(function(){
		if($(this).val()==''){
			messageErr = 'This field is required.';
			$(this).next('.error-box').children('p').text(messageErr);
			$(this).next('.error-box').show();
		}
		
	});
	
	if(messageErr!=''){	
		return false;
	}else{
		
		ServdateTime();
		TellUs();
		$(document).on('change', '#selectTime', function() {
			ServdateTime();
		});
		
		if($('#selectAns').val()>0)
		{
			var nexQueId = $('option:selected', $('#selectAns')).data('next');
			console.log(nexQueId);
			setTimeout(function(){$('.nextQue').removeAttr('disabled')},100);
			$('.nextQue').attr('data-qid',nexQueId);
			backQueId = $('.nextQue').attr('data-current_id');
			opId = $('#selectAns').val();
			if($.inArray(backQueId,queArray)==-1)
				{	
					queArray.push($.trim(backQueId));
					selectOption=true;
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
				}
				
			setTimeout(function(){$('.nextQue').removeAttr('disabled')},100);
		});
		
		if(((inputType=='checkbox') || (inputType=='radio')) && $('.childbox').is(':checked'))
		{
			var nexQueId = $('.childbox').data('next');
			$('.nextQue').attr('data-qid',nexQueId);
			if($('#TellUs').val()=='' && $('#customInfoYes').is(':checked')){
				setTimeout(function(){$('.nextQue').attr('disabled',true);},100);
				
				return false;
			}else{
				setTimeout(function(){$('.nextQue').removeAttr('disabled')},100);
			}
			
			
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
	}
	
	$( "."+inputClass ).keyup(function(){
		
		
		if($("."+inputClass).val().length > 0)
		{
			if($( "."+inputClass ).hasClass('zip')){
				if(validateZIP($("."+inputClass).val(),inputClass)==true){
					$("."+inputClass).next('.error-box').html('<p></p>');
					$("."+inputClass).next('.error-box').hide();
					$('.nextQue').prop('disabled', false);
				}
			}
			
			if($( "."+inputClass ).hasClass('email')){
				if(validateEmail($("."+inputClass).val(),inputClass)==true){
					$("."+inputClass).next('.error-box').html('<p></p>');
					$("."+inputClass).next('.error-box').hide();
					$('.nextQue').prop('disabled', false);
				}else{
					$("."+inputClass).next('.error-box').children().html('Please enter valid email address.');
					$("."+inputClass).next('.error-box').show();
					$('.nextQue').prop('disabled', true);	
					return false;
				}
			}
			
			if($( "."+inputClass ).hasClass('phone')){
				if(validatePhone($("."+inputClass).val(),inputClass)==true){
					$("."+inputClass).next('.error-box').html('<p></p>');
					$("."+inputClass).next('.error-box').hide();
					$('.nextQue').prop('disabled', false);
				}
			}
			if($( "."+inputClass ).hasClass('name')){
				
				var fld = $( "."+inputClass );
				validateUsername(inputClass,fld)
			}
			
			
		}else{
			$("."+inputClass).next('.error-box').children().html('This field is required.');
			$("."+inputClass).next('.error-box').show();
		    $('.nextQue').prop('disabled', true);	
		}
		
		});
}

function validateZIP(field,inputClass) {
	var valid = "0123456789-";
	var hyphencount = 0;

	if (field.length!=5 && field.length!=10) {
			$("."+inputClass).next('.error-box').children().html('Please enter your 5 digit or 5 digit+4 zip code.');
			$("."+inputClass).next('.error-box').show();
		    $('.nextQue').prop('disabled', true);	
			return false;
	}
	for (var i=0; i < field.length; i++) {
		temp = "" + field.substring(i, i+1);
		if (temp == "-") hyphencount++;
		if (valid.indexOf(temp) == "-1") {
			$("."+inputClass).next('.error-box').children().html('Invalid characters in your zip code.  Please try again.');
			$("."+inputClass).next('.error-box').show();
		    $('.nextQue').prop('disabled', true);	
			return false;
		}
		if ((hyphencount > 1) || ((field.length==10) && ""+field.charAt(5)!="-")) {
			
			$("."+inputClass).next('.error-box').children().html('The hyphen character should be used with a properly formatted 5 digit+four zip code, like \'12345-6789\'.   Please try again.');
			$("."+inputClass).next('.error-box').show();
		    $('.nextQue').prop('disabled', true);	
			return false;
		   }
	}
	return true;
}

function validateEmail(field,inputClass) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(field);
}

function validatePhone(field,inputClass){  
  var phoneno = /^\d{10}$/;  
  if((field.match(phoneno))) {  
	  return true;  
  }else {  
		$("."+inputClass).next('.error-box').children().html('Please enter valid phone number.');
		$("."+inputClass).next('.error-box').show();
		$('.nextQue').prop('disabled', true);	
		return false;
		
	}  
}  
function validateUsername(inputClass,fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
	console.log(illegalChars.test(fld.val()));
    if (fld.val() == "") {
        error = "This field is required.";
		$("."+inputClass).next('.error-box').children().html(error);
		$("."+inputClass).next('.error-box').show();
        return false;
 
    } else if (fld.val().length < 3) {
        error = "Name should be greater then 3 characters.";
		$("."+inputClass).next('.error-box').children().html(error);
		$("."+inputClass).next('.error-box').show();
		return false;
 
    } else if (illegalChars.test(fld.val())===true || isNaN(fld.val())===false) {
        error = "The username contains illegal characters.";
		$("."+inputClass).next('.error-box').children().html(error);
		$("."+inputClass).next('.error-box').show();
		return false;
    } 
    return true;
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
			$( "#datepicker" ).datepicker({onSelect: popupValidation});
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
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectDateOption=true;
			}
			$('.nextQue').attr('data-qid',nexQueId);
			backQueId = $('.nextQue').attr('data-current_id');
			opId = val;
			
			if($('#datepicker').val()==''){
				messageErr = 'This field is required.';
				$('#datepicker').next('.error-box').children('p').text(messageErr);
				$('#datepicker').next('.error-box').show();
				$('.nextQue').attr('disabled',true);
				return false;
			}
			
				

			
		}else if(val=='flexible_time' || val=='next_few_days' || val=='immediate')
		{
			backQueId = $('.nextQue').attr('data-current_id');
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
				selectDateOption=true;
			}
			$('.nextQue').attr('data-qid',nexQueId);
			backQueId = $('.nextQue').attr('data-current_id');
			opId = val;
		}
	
		
		setTimeout(function(){$('.nextQue').removeAttr('disabled')},100);
	}
}
function TellUs() {
		var nexQueId = $('.nextQue').attr('data-qid');
		if($('#customInfoYes').is(':checked'))
		{
			backQueId = $('.nextQue').attr('data-current_id');
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
			}
			$('.nextQue').attr('data-qid',nexQueId);
			if($('#TellUs').val()==''){
				messageErr = 'This field is required.';
				$('#TellUs').next('.error-box').children('p').text(messageErr);
				$('#TellUs').next('.error-box').show();
				$('.nextQue').attr('disabled',true);
				return false;
			}
			
		}
		if($('#customInfoNo').is(':checked')){
			backQueId = $('.nextQue').attr('data-current_id');
			if($.inArray(backQueId,queArray)==-1)
			{	
				queArray.push($.trim(backQueId));
			}
			$('.nextQue').attr('data-qid',nexQueId);
			var TellusData = '';
		}
	}


</script>

<style>
.innerAns{display:none;}
.serviceList.active{
	opacity:0.6;
}
</style>