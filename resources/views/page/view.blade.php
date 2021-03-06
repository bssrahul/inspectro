@extends('layouts.page')
@section('content')
	<!--[content]-->
	@if(Session::has('flash_message'))
    <div class="alert alert-success"><span style="text-align=center;" > {!! session('flash_message') !!}</span></div>
	@endif
		<?php if(!empty($pageData)){?>
				<div class="inner-cont">
					<?php $destinationPath =  url().'/public/uploads/'; ?>
						<div style="background-image:url('<?php echo $destinationPath."/".$pageData->bannar_image ; ?>')" class="inner-banner about-inner-banner">  
							<div class="container">
								<div class="ib-txt">
									<h1><?php echo $pageData->page_title; ?></h1>                          
										<p><?php echo $pageData->page_heading; ?> </p>
								</div>
							</div>                    	
						</div>
						<div class="howitwork">
							<div class="container">
								<div class="row">
									<?php echo $pageData->page_content; ?>
								
									<?php if($slug == 'contact-us' ){ ?>
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">                                    	 
											<div class="cfa-rgt"> 
												<div class="cont-form">
                                        		
												{!! Form::open(array('id'=>'contactForm','route' => ['pages', 'flag'=>'mail'])) !!}
												<div class="form-group">
														{!! Form::text('name', null, ['class' => 'form-control required','placeholder'=>'Name']) !!}
														{!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
												</div>
												<div class="form-group">
														{!! Form::email('email', null, ['class' => 'form-control required','placeholder'=>'Email']) !!}
														{!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
												</div>
												<div class="form-group">
														{!! Form::text('subject', null, ['class' => 'form-control required','placeholder'=>'Subject']) !!}
														{!! $errors->first('subject', '<div class="text-danger">:message</div>') !!}
												</div>
												<div class="form-group">
														{!! Form::textarea('mes', null, ['class' => 'form-control txt required ','placeholder'=>'Message']) !!}
														{!! $errors->first('mes', '<div class="text-danger">:message</div>') !!}
												</div>
												<div class="form-group">
														{!! Form::submit('SEND',array('class'=>'btn btn-primary send-btn')) !!}
												</div>
												{!! Form::close() !!}
																								
                                            </div>    
                                            
                                        </div>
                                    </div>                                                                        
                                	<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                    </div>                                    
                                </div>
                             </div>   
                           </div>        
				</div>	
				<?php } ?>
						<?php if($slug == 'work'){ 
								if(!empty($blockDataInfo)){
									$fg=1;
									foreach($blockDataInfo as $k => $blockData){?>
									<div class="step-area">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<?php if($fg % 2 == 0){?>
											
											<div class="row">
												<div class="step-in">		
													<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">
													</div>
													 <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
													  <div class="step-rgt">
															<div class="img-box">
																<img src="<?php echo $destinationPath."/".$blockData->image ; ?>" alt=""/>
														   </div>
													  </div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<div class="step-lft">
															<p class="shead"><b><?php echo $fg; ?></b><?php echo $blockData->title ; ?></p>
															<p><?php echo $blockData->description ; ?></p>
														</div> 
													</div>
											   
													<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">
													</div>
												</div>
											</div> 
											
										
										<?php } else{ ?>
											<div class="row">
												<div class="step-in">	
													<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">
													</div>
													 <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mob">
													  <div class="step-rgt">
															<div class="img-box">
																<img src="<?php echo $destinationPath."/".$blockData->image ; ?>" alt=""/>
														   </div>
													  </div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<div class="step-lft">
															<p class="shead"><b><?php echo $fg; ?></b><?php echo $blockData->title ; ?></p>
															<p><?php echo $blockData->description ; ?></p>
														</div> 
													</div>
													<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">
													  <div class="step-rgt">
															<div class="img-box">
																<img src="<?php echo $destinationPath."/".$blockData->image ; ?>" alt=""/>
														   </div>
													  </div>
													</div>
														<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 desk">
														</div>
													</div>
												</div> 
											<?php } ?>
										</div>                                                                                               
									</div>
							
						<?php $fg++ ;} } }?>
                           
                        </div>
                    </div>
					
                <?php if($slug == 'about-us'){?>
                
                  <!--[Testimonial]-->
            	<section class="testimonial">
                	
						<div class="container">
						  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						  
						  <!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php if(!empty($ourTestimonialData)){
									//echo $ArrTestimonialCount=count($ourTestimonialData);
									$Flag=1;
									foreach($ourTestimonialData as $k => $ourTestimonial){
									if($Flag == ($k+1)){
								?>
								
							  <div class="item active">       
								<div class="carousel-caption">
								  <h3> <?php echo $ourTestimonial->name; ?><span><?php echo $ourTestimonial->location; ?></span></h3>
								  <p><?php echo $ourTestimonial->description; ?></p>
								</div>
							  </div>
									<?php } else { ?>
							  <div class="item">
								<div class="carousel-caption">
									<h3> <?php echo $ourTestimonial->name; ?><span><?php echo $ourTestimonial->location; ?></span></h3>
									<p><?php echo $ourTestimonial->description; ?></p>
								</div>
							  </div>    
									<?php } }  }  ?>
						  
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							  <span class="left-arrow"  aria-hidden="true"></span>
							 
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							 <span class="right-arrow"  aria-hidden="true"></span>
							 
							</a>
						  </div>
						</div>
                </section>
            <!--[/Testimonial]-->
              <?php }else if($slug == 'contact-us'){?>  
			
						<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:400px;width:1400px;'><div id='gmap_canvas' style='height:400px;width:1400px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https:/disclaimergenerator.net">disclaimer example</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(51.165691,10.451526000000058),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.165691,10.451526000000058)});infowindow = new google.maps.InfoWindow({content:'<strong>Inspectro</strong><br>Germany<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			  
			  
			  <?php }else if($slug != 'privacy-policy'){?> 
			 
				<div class="workbot-wrap">
                    	<div class="container">
                        	<div class="row">
                            	<div class="wbr-area">
                                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               	    	<img src="{{asset('public/img/step-bot-img.png')}}"  alt=""/>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
			<?php } ?>
            </div>	
	<?php } ?>   
    <!--[/content]-->
	
@stop

@section('scripts')
    jQuery(document).ready(function() {
      	$('#contactForm').validate();
    });
@stop	

