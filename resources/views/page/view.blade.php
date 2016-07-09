@extends('layouts.page')
@section('content')
	<!--[content]-->
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
                            </div>
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
              <?php }else {?>  
			  
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
