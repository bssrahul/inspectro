 
	<!--[Header]-->  
    	<header id="head-wrap">
        	
            	<div class="container">
                <!--Logo wrap-->
        		<div class="logo-wrap">
                	<div class="row">
                    	<!--logo area-->                    	
                        	<div class="logo-area">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                                	<div class="logo">
	                           	    	<a href="#" title="Inspectaro"><img src="{{asset('public/img/inspectaro.png')}}"  alt="Inspectaro"/></a>
                                    </div>    
                                 </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                	<div class="logo-rgt">
                                    	<ul class="nav navbar-nav lang-nav">
                                        	<li><a href="#" title="">For Expert</a></li>
                                            <li class="dropdown last">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{asset('public/img/language.png')}}"  alt="Language"/>En</a> 
                                            		<ul class="dropdown-menu l-menu">
                                                    <li><a href="#"><img src="{{asset('public/img/french.png')}}"  alt="French"/> French</a></li>
                                                    <li><a href="#"><img src="{{asset('public/img/spanish.png')}}"  alt="French"/> Spanish</a></li>
                                                    <li><a href="#"><img src="{{asset('public/img/russian.png')}}"  alt="French"/>Russian</a></li>
                                                  </ul>
                                            
                                            </li>
                                        </ul>
                                    </div>                            
                                </div>
                            </div>
                        <!--/logo area-->                    	
                    </div>
                </div>
               <!--/Logo wrap-->                 
               <!--Banner Text-->
               	<div class="ban-txt">
                	<div class="row">
                    	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        	<h1> We make it easy to hire the <span>right professional for any project</span></h1>
                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum has been the industry's<span> standard dummy text ever since the 1500s, when an unknown printer took a galley of type</span></p>
                            	<ul class="ban-list">
                                	<li class="control-group"><label class="control control--checkbox"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                           <input type="checkbox" />
                                          <div class="control__indicator"></div>  </label>                                       
                                       </li>                                    
                                           <li class="control-group"><label class="control control--checkbox"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                           <input type="checkbox" />
                                          <div class="control__indicator"></div>  </label>                                       
                                       </li>
                                </ul>
                        </div>
                    </div>
                </div>
               <!--Banner Text-->
               <!--Search Box-->
               		<div class="search-area">
                    	<h2>What are you looking for?</h2>
                    	<div class="search-box">
                        	<div class="head-box"><a href="" title="Home Inspection for real estate buyer ">							
                       	    	<span><img src="{{asset('public/img/search-home-icon.png')}}" alt=""/> </span>
                           	    <p>Home inspection for real estate buyer</p>
							  </a>
                            </div>
	
                            <form>
                            	<ul class="s-list">
                                	<li><a href="javascript:void(0)" id="{{$services[0]->id}}" class="serviceList" title="Haus"><img src="{{asset('public/img/search-icon1.png')}}"  alt="Haus"/>Haus</a></li>
                                    <li><a href="javascript:void(0)" id="{{$services[1]->id}}" class="serviceList" title="Wohnung"><img src="{{asset('public/img/search-icon2.png')}}"  alt="Wohnung"/>Wohnung</a></li>
                                    <li><a href="javascript:void(0)" id="{{$services[2]->id}}" class="serviceList" title="Gewerbe"><img src="{{asset('public/img/search-icon3.png')}}"  alt="Gewerbe"/>Gewerbe</a></li>
                                </ul> 
								<input type="button" value="NEXT" class="btn btn-success next" id="myBtn">
                            </form>	                    	
                        </div>    
                    </div>
               <!--Search Box-->
            </div>
                  	     	
        </header>    	    	
    <!--[/Header]--> 
	    							<?php  print_r($services[0]->id); ?>