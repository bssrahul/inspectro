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
                                            <li>{!! link_to_route('pages', 'About',['slug'=>'about-us'  ]) !!}</li>
                                           <li>{!! link_to_route('pages', 'Privacy Policy',['slug'=>'privacy-policy'  ]) !!}</li>
                                            <li><a href="#" title=""> Team</a></li>
                                            <li><a href="#" title=""> Blog</a></li>
                                    </div>
                                </div>
                            	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                	<div class="foot-box">
                                    	<p class="fhead">Customers</p>
                                        	<ul>
											<li>{!! link_to_route('pages', 'How it works',['slug'=>'work'  ]) !!}</li>
                                          
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
                                         	<li>{!! link_to_route('pages', 'How it works',['slug'=>'work'  ]) !!}</li>
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
                                          	<li>{!! link_to_route('pages', 'Contact Us',['slug'=>'contact-us'  ]) !!}</li>
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
     <div class="modal-dialog popup-1">	
       <div class="modal-content">  
		<div class="inner-popup">	
<!--popup Content-->
	<div class="popup-cont">
		<div class="welcome">
			<p>To find you a great expert <span>we will now ask you some question</span></p>
		</div>
	</div>
<!--/popup Content-->
<!--Popup footer-->
	<div class="popup-foot">
		<input type="submit" value="NEXT"  class="btn btn-success submit" id="1">		
	</div>
<!--/Popup footer-->
		</div>
       </div>      
     </div>
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
   var serviceId=$(this).attr('id');
   //console.log(serviceId);
  //alert("opkiokoko");
     //alert('<?php echo url('/')."/serviceslist"; ?>');
  // var CSRF_TOKEN = "<?php echo csrf_token(); ?>";
   $.ajax({
    url: '<?php echo url('/')."/serviceslist"; ?>',
    type: 'get',
   // data: 'serviceId='+serviceId+'&_token='+CSRF_TOKEN,
   
    success: function (data) {
        alert(data);       
	   console.log(data);
    }
});
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

