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
            

<script src="{{ asset('/public/js/jquery.min.js') }}"></script>
<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/public/js/fm.checkator.jquery.js') }}"></script> 



<!--[Welcome Popup]-->
	<div class="modal fade" id="myModal" role="dialog">
    
   </div> 
<!--[/Wecome Popup]-->

 <script>
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
	
	$(".serviceList").click(function(){
		$(this).css('opacity', function(i,o){
        return parseFloat(o).toFixed(1) === '0.6' ? 1 : 0.6;
    });
	var serviceId=$(this).attr('id');
	var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
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
	        console.log(data);
    }
		});
	});

});	


$(document).on('click','.nextQue,.back',function(){
	var serviceId=$(this).data('serviceid');
	
	var Qid=$(this).data('qid');
	console.log("serviceId: "+serviceId);
	console.log("Qid: "+Qid);
	
	  
  var CSRF_TOKEN = "<?php echo csrf_token(); ?>";

	var loadingImage="{{ asset('/public/img/ajaxloader/ajaxloader.gif') }}";
	
	$.ajax({
		url: '<?php echo url('/')."/nextquestion"; ?>',
		type: 'get',
		data: 'serviceId='+serviceId+'&Qid='+Qid+'&_token='+CSRF_TOKEN,
		beforeSend: function( xhr ) {
				$('.inner-popup').append('<div id="loadering"><img src="'+loadingImage+'"></div>');
				//return false;
		},
		complete: function() {
			$("#loadering").remove();
		},
		success: function (data) {
		  // alert(data);    
				$('#myModal').html(data);
				console.log(data);
				
		}
	}); 
	  
	
    
	
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


</script>

