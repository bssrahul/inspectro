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

			<?php 
			if($checkEntry!=0)
			{
				foreach($checkEntry as $key=> $value){
				$options=json_decode($value->options,true);
				foreach($options as $k=>$v)
				{
					if(isset($options[$k]['zip'])){ 
					 $zip = $options[$k]['zip'];}
					 
					if(isset($options[$k]['email'])){ 
					 $email = $options[$k]['email'];}
					
					if(isset($options[$k]['name'])){ 
					 $name = $options[$k]['name'];}
					
					if(isset($options[$k]['phone'])){ 
					 $phone = $options[$k]['phone'];}
					 
					 if(isset($email) && isset($phone))
					 {
						$email_text='checked';
					 }else if(isset($email))
					 {
						$emailOnly='checked' ;
					 }
				}
			}
			}
			?>
<!--[Welcome Popup]-->
	<div class="modal fade" id="myModal" role="dialog">
    
   </div> 
<!--[/Wecome Popup]-->


<!--[Popup] 8-->
	<div class="modal fade" role="dialog" id="staticQ1">
     <div class="modal-dialog popup-1">	
       <div class="modal-content">  
		<div class="inner-popup">
		<!--popup head-->
			<div class="pop-head">
			<!--progress-->
			<div class="top-progress">
				  <div class="progress">
					  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:90%">
					    90% Completed
					  </div>
			       </div>
			  </div>
			<!--progress-->
          <p class="phead queTitle" id="0">Please confirm where you need <br>the service.   </p>
			</div>
		<!--/popup head-->
		<!--popup Content-->
	<div class="popup-cont">
		 <ul class="plist">
		   <li class="option">
 		   <input type="text" name="zip" class="txt childbox for_zip" placeholder="Zip Code">
				<div class="errorBox"></div>
		   </li>
		   
		 </ul>
	</div>
	<!--/popup Content-->
	<!--Popup footer-->
	<div class="popup-foot">
		<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-current_id='0' data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>'>
		<a class="back"  data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>' data-qid='<?php if(isset($_SESSION['lastdynamicQID'])){echo $_SESSION['lastdynamicQID']; }?>' title="Back" href="javascript:void(0)">Back</a>
	</div>
	<!--/Popup footer-->

		</div>
       </div>      
     </div>
   </div> 
<!--[/Popup]8 -->

<!--[Popup] 9-->
	<div  class="modal fade" role="dialog" id="staticQ2">
     <div class="modal-dialog popup-1" >	
       <div class="modal-content">  
		<div class="inner-popup">
		
			<div class="pop-head">
		
				<div class="top-progress">
				  <div class="progress">
					  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:95%">
					    95% Completed
					  </div>
			       </div>
				</div>
		
				<p class="phead queTitle" id='p2'>How would you like to hear from professionals? </p>
			</div>
				
			<div class="popup-cont">
				 <ul class="plist-2">		
						<li>
							<div class="option-txt">
							<p class="phead">  </p>
							<input type="radio" name="comm_medium" class='childbox' id="email"> I want quotes by email only</br>
							<input type="radio" name="comm_medium" class='childbox' id="email_text"> I want quotes by email and text message
							<p> By selecting this option, you electronically authorize Inspectaro to send you automated text messages to notify you of quotes from Inspectaro pros. Receiving text messages is optional. </p>
							</div>
							
							<label class="for_email_label"> What's your email address? </label>
							<input type="text" name="email"  class="for_email childbox" placeholder="Enter Email Id">
							<div class="errorBox for_email"></div>
					  
							<label class="for_phone_label" >Phone number </label>
							<input type="text" name="phone"  class="for_phone childbox" placeholder="Ex. 9864646456">	
							<div class="errorBox for_phone"></div>
						</li>
			
				 </ul>
			</div>
		
	<div class="popup-foot">
		<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-current_id='p2' data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>'>
		<a class="back"  data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>' data-qid='0' title="Back" href="javascript:void(0)">Back</a>	
	</div>
	

		</div>
       </div>      
     </div>
   </div> 
<!--[/Popup]9 -->

<!--[Popup] 10-->
	<div class="modal fade"  role="dialog" id="staticQ3">
     <div class="modal-dialog popup-1" >	
       <div class="modal-content">  
		<div class="inner-popup">
		<!--popup head-->
			<div class="pop-head">
			<!--progress-->
			<div class="top-progress">
				  <div class="progress">
					  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
					    100% Completed
					  </div>
			       </div>
			  </div>
			<!--progress-->
          <p class="phead queTitle" id="p3">Please enter your full name.  </p>
			</div>
		<!--/popup head-->
		<!--popup Content-->
	<div class="popup-cont">
		 <ul class="plist">
		   <li class="option">
 		   <input type="text" name="name" class="txt childbox" placeholder="First and Last Name"> 
			<div class="errorBox"></div>
		   </li>
		   
		 </ul>
	</div>
	<!--/popup Content-->
	<!--Popup footer-->
	<div class="popup-foot">
		<input type="submit" value="Send Request" class="btn btn-success submit nextQue"  data-current_id='p3' data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>'>
		<a class="back"  data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>' data-qid='p2' title="Back" href="javascript:void(0)">Back</a>
		
		<div class="tc-area">
			<p> By clicking Get Quotes you agree to Thumbtack's
 <span><a href="" title="Terms of Services">Terms of Service</a> and <a href="" title="Privacy Policy"> Privacy Policy. </a></span>
<a hrea="" title="" title="Contact Us">Contact us</a> if you have any questions or concerns.
</p>
		</div>
	</div>
	<!--/Popup footer-->

		</div>
       </div>      
     </div>
   </div> 
<!--[/Popup] 10 -->


<!--[/Popup] 11 -->
	<div class="modal fade"  role="dialog" id="staticQ4">
     <div class="modal-dialog popup-1" >	
       <div class="modal-content">  
		<div class="inner-popup">	

<!--popup Content-->
	<div class="popup-cont">
		<div class="done">
			<p>Great! We’re on it.</span></p>
		</div>
	</div>
<!--/popup Content-->
<!--Popup footer-->
	<div class="popup-foot pf-done">
		<p>We’re reaching out to persons in your area
<span>who are qualified to complete your  project</span></p>
		<input type="submit" value="Whats Next" class="btn btn-success submit" data-current_id='p4' data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>'>
		<a class="CancelProject"  data-serviceId='<?php if(isset($_SESSION['serviceId'])){echo $_SESSION['serviceId']; }?>' data-qid='p3' title="Back" href="javascript:void(0)">Cancel Project</a>
	</div>
<!--/Popup footer-->
		</div>
       </div>      
     </div>
   </div> 
<!--[/Popup] 11 -->
 <script>
var queArray = []; 
var quoteOptionsArr = new Array();
		

		
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});	

$(document).ready(function(){
	i=2;
	$("#myBtn"+i).click(function(){
	console.log(i);
	$(".popup-foot").attr('id',i+1);
});
});	

$(document).ready(function(){
	
	popupValidation();
	$(".serviceList").click(function(){
		queArray=[];
		$(this).css('opacity', function(i,o){
        return parseFloat(o).toFixed(1) === '0.6' ? 1 : 0.6;
    });
	var serviceId=$(this).attr('id');
	var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
	
	
	quoteOptionsArr['serviceId_'+serviceId] = new Array();
	
	
	
	//console.log(serviceId);
	//alert(loadingImage);
    //alert('<?php echo url('/')."/serviceslist"; ?>');
	var CSRF_TOKEN = "<?php echo csrf_token(); ?>";
	$.ajax({
    url: '<?php echo url('/')."/serviceslist"; ?>',
    type: 'get',
    data: 'serviceId='+serviceId+'&_token='+CSRF_TOKEN,
	beforeSend: function( xhr ) {
			//$('body').append('<div id="loadering"><img src="'+loadingImage+'"></div>');
			//return false;
		},
    success: function (data) {
       // alert(data);    
			$('#myModal').html(data);
	       // console.log(data);
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
	/* if($(this).is(':checked')) { 
	$(this).parent('li').next().find('.innerAns').show();
	} */
});

$(document).on('click','.nextQue,.back',function(){
	if (typeof $(this).data('qid') ==='undefined')
		{
			alert("Please choose Any Option");
			return;
		}else{
	var backQueId = $('.nextQue').data('current_id');
	console.log('backQueId'+backQueId);
	/*  if(backQueId==0)
	{
		//alert(backQueId);
		backQueId="<?php if(isset($_SESSION['backQid'])){ echo $_SESSION['backQid']; }?>";
		console.log('back'+"<?php echo $_SESSION['backQid'] ; ?>");
		//alert(backQueId);
	}  */
	var serviceId=$(this).data('serviceid');
	$('.innerAns').hide();
	
	var Qid=$(this).attr('data-qid');
	if (typeof(Storage) !== "undefined") {
	if($(this).hasClass('nextQue') && ($('.childbox').is(':checked') || $('.childbox').val().length>0))
	{
		
		//alert($.inArray(backQueId,queArray));
		if($.inArray(backQueId,queArray)==-1)
		{
			//alert(backQueId);
			queArray.push($.trim(backQueId));
		}
		console.log("Qarray "+queArray);
		var data={};
	    var OptArray=new Array();
		data.serviceId=serviceId;
		data.QId = backQueId;
		//alert(backQueId);
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
		console.log(data);
		var CSRF_TOKEN = "<?php echo csrf_token(); ?>";
	$.ajax({
		url: '<?php echo url('/')."/localstorage"; ?>',
		type: 'get',
		data: 'data='+JSON.stringify(data)+'&_token='+CSRF_TOKEN,
		success: function (RetData){   		
		console.log(RetData);		
		}
	}); 
	}
	} else {
    // Sorry! No Web Storage support..
	alert('your browser is out of date! Update It');
	}
	
	if(Qid==0)
	{
		//alert(Qid);
		var popup = $('#staticQ1').html();
		//alert(popup);
		$('#myModal').html(popup);
		popupValidation();
		//$('childBox').attr('data-next','p2');
		$('.nextQue').attr('data-qid','p2');
		
		return;
	}
	
	if(Qid=='p2')
	{
		
		var popup = $('#staticQ2').html();
		//alert(popup);
		$('#myModal').html(popup);
		popupValidation();
		//$('childBox').attr('data-next','p3');
		$('.nextQue').attr('data-qid','p3');		
		$('.for_email,.for_email_label').hide();
		$('.for_phone,.for_phone_label').hide();
		return;
	}
	
	if(Qid=='p3')
	{
		var popup = $('#staticQ3').html();
		//alert(popup);
		$('#myModal').html(popup);
		popupValidation();
		$('.nextQue').attr('data-qid','p4');
		return;
	}
	
	if(Qid=='p4')
	{
		var popup = $('#staticQ4').html();
		//alert(popup);
		$('#myModal').html(popup);
		popupValidation();
		return;
	}
	console.log("serviceId: "+serviceId);
	console.log("Qid: "+Qid);  
	var CSRF_TOKEN = "<?php echo csrf_token(); ?>";
	var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
	console.log("Id:"+Qid);
	console.log("indx:"+queArray.indexOf(Qid.toString()));
	//alert("indx:"+$.inArray(Qid,queArray));
	//alert(queArray);
	//alert(Qid);
	//alert(CheckArrayIndex(queArray,$.trim(Qid)));
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
    $('.plist li').click(function(event) {
     //alert(event.target.type);
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
    });
});


function CheckArrayIndex(customArray,valueForCheck) {
    var fruits = customArray;
    var a = fruits.indexOf(valueForCheck);
    return a;
}

function popupValidation()
{
	
	$('.nextQue').prop('disabled', true);
	var inputType = $('.childbox').attr('type');
	var inputName = $('.childbox').attr('name');
	//alert(inputType);
	if(((inputType=='checkbox') || (inputType=='radio')) && $('.childbox').is(':checked'))
	{
		console.log('checked');
		var nexQueId=$('.childbox').data('next');
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

function errorMsg(inputClass,fieldName)
{
	//alert(inputClass);
	if($("."+inputClass).val().length>0)
	{
		$('.nextQue').prop('disabled', false);
	}else{
		$('.errorBox').html('<div class="alert alert-danger">'+
		'<strong>Danger!</strong> Please Enter Details .</div>');
		$('.nextQue').prop('disabled', true);
	}
		
	$( "."+inputClass ).keyup(function() {
		
		if($("."+inputClass).val().length > 0)
		{
			$('.errorBox').html('');
			$('.nextQue').prop('disabled', false);
		}else{
			$('.errorBox').html('<div class="alert alert-danger">'+
			'<strong>Danger!</strong> Please Enter Details</div>');
		    $('.nextQue').prop('disabled', true);	
		}
		});
}
	
	

</script>

<style>
.innerAns{display:none;}
</style>