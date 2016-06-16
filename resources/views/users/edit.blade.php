@extends('layouts.default')
@section('content')
<style>
.pro-left img.profileImg {
	width:100%;
	height:100%;
	border-radius:50%;
}
.pro-left img {
	border-radius:0;
}
.centerLoader{
    width: auto !important;
    height: auto !important;
    position: absolute;
    top: 40%;
    left: 44%;
}

</style>
<div class="profile-details">
  <div class="container">
	  <div class="profile-innerd">
		<div class="row">
		  <div class="col-lg-4 pro-left">
			 <h2>General Profile</h2>
			  
				  <div class="pro-img" id="uploadImage" data-rel="{{Auth::user()->id}}">
					<?php if(Auth::user()->avatar!=''){ 
					
							if((strpos(Auth::user()->avatar,'http://')!== false || strpos(Auth::user()->avatar,'https://')!== false)) {
					?>
							<img src="<?php echo str_replace('=normal','=large&width=200&height=200',Auth::user()->avatar) ?> "   class="profileImg">
					<?php	}else { ?>
					
								<img src="{{ asset('/public/img/memberImages/')}}/{{ Auth::user()->avatar }}"   class="profileImg">
					<?php	} 
					}else{ ?>
						<img src="{{ asset('/public/img/Flying_profile.png') }}"  >
					<?php } ?>
					
				  </div>
				
			  
			   <div class="social-icon-pro">
				  <ul>
				  	<?php if(Auth::user()->provider_id!=''){ ?>
						<li class="facebook-pro"><a href="javascript:void(0);"><i class="fa fa-facebook"></i>Connected</a></li>
					<?php }else{ ?>
						<li class="facebook-pro"><a href="{!!URL::to('login/facebook')!!}"><i class="fa fa-facebook"></i>Sync with Facebook</a></li>
					<?php } ?>
				  </ul>
			  </div>
		  </div>
		  <form role="form" action="{{ url('/exchange-store') }}" method="post" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="{{ Auth::user()->id }}">
		  <div class="col-lg-8 pro-right">
			  
		  <div class="profile-bio">
				  <div class="form-group">
					  <div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rud_spa_1">
							<label class="control-label lblExtr" for="email">First Name : </label>
						</div>
						<!--<label class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-12" for="email">First Name : </label>-->
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						  <input type="text" class="form-control" id="fname" value="{{ Auth::user()->fname }}" name="fname">
						  <label class="error pError">{{$errors->first('fname')}}</label>
						</div>
					  </div>
				  </div>
				  <div class="form-group">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rud_spa_1">
							<label class="control-label lblExtr" for="email">Last Name : </label>
						</div>
					
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					  <input type="lname" class="form-control" id="lname" value="{{ Auth::user()->lname }}" name="lname">
					  <label class="error pError">{{$errors->first('lname')}}</label>
					</div>
					</div>
				  </div>
				   <div class="form-group">
				   <div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rud_spa_1">
							<label class="control-label lblExtr" for="email">Email : </label>
						</div>
					
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					  <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email">
					  <label class="error pError">{{$errors->first('email')}}</label>
					</div>
					</div>
				  </div>
				  <div class="form-group">
				   <div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rud_spa_1">
							<label class="control-label lblExtr" for="email">Password : </label>
						</div>
				
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					  <input type="password" class="form-control" id="password" value="" placeholder="*******" name="password">
					  
					</div>
					</div>
				  </div>
				   <!--<div class="form-group">
					<label class="control-label col-sm-3" for="pwd">Contact : </label>
					<div class="col-sm-9 col-xs-12">
					  <input type="text" class="form-control" id="contact"  value="{{ Auth::user()->contact }}" name="contact">
					   <label class="error pError">{{$errors->first('contact')}}</label>
					</div>
				  </div>-->
				
		  </div>
		 
		  

		  </div>
		  
		  <div class="col-lg-12 pro-right exchange-profile edit-area">
			 <!--<p class="pull-right"><a href="{{ url('/exchange-update') }}" class="pro-edit">Edit Details <i class="icon-edit"></i></a></p>-->
			<h2>Exchange / International Studies details</h2>
		  <div class="profile-bio edit-area">
		  
				   
			
					
					<div class="form-group typeOfUser">
					
					<div class="row">
              		  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
						<label class="control-label" for="email">Type of user : </label>
					  </div>
                      
                        <div class="col-sm-9 col-xs-12">
						    
							<?php /*{!! Form::hidden('type', Input::old('type')!=''?Input::old('type'):(@$exchangeDetail->type!=''?@$exchangeDetail->type:'1'), array('id' => 'type')) !!}
							
							 <ul class="nav nav-pills">
                              <li class="selectType {{ Input::old('type')=='1'?'active':(@$exchangeDetail->type=='1'?'active':'active') }}" data-usertype="1"><a href="javascript:void(0);">Adventurer</a></li>
                              <li class="selectType {{ Input::old('type')=='2'?'active':(@$exchangeDetail->type=='2'?'active':'') }}" data-usertype="2"><a href="javascript:void(0);">Senior</a></li>
                              <li class="selectType {{ Input::old('type')=='3'?'active':(@$exchangeDetail->type=='3'?'active':'') }}" data-usertype="3"><a href="javascript:void(0);">The Undecided</a></li>
                              <li class="selectType {{ Input::old('type')=='4'?'active':(@$exchangeDetail->type=='4'?'active':'') }}" data-usertype="4"><a href="javascript:void(0);">Curious Onlooker</a></li>
                           </ul>
							*/ ?>
							 {!! Form::select('type', array(""=>"Please select") + $userTypes,Input::old('type')!=''?Input::old('type'):(@$exchangeDetail->type!=''?@$exchangeDetail->type:''), array('id' =>
											'type','class'=>'form-control selectMenu ', 'autocomplete'=>'off')) !!}
								
                          
						   <label class="error pError">{{$errors->first('type')}}</label>
                        </div>
                        </div>
                     </div>
                   
                     <div class="form-group home-univ">
                        <div class="row">
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
									<label class="control-label" for="pwd">Home University : </label>
						 </div>
                        <div class="col-sm-9 col-xs-12">
                           {!! Form::select('homeUniversityID', array(""=>"Please select") + $homeUnivList,Input::old('homeUniversityID')!=''?Input::old('homeUniversityID'):(@$exchangeDetail->homeUniversity->id!=''?@$exchangeDetail->homeUniversity->id:''), array('id' =>
											'homeUniversityID','class'=>'form-control selectMenu', 'autocomplete'=>'off')) !!}
                         <label class="error pError">{{$errors->first('homeUniversityID')}}</label>
						</div>
						</div>
                     </div>
					 
					 <div id="newHomeUniversityDiv" class="form-group" style="display:{{ Input::old('homeUniversityID')=='1'?'block':'none'}};">
						 <label for="" class="control-label col-sm-3 "></label>
						<div class="col-sm-9 col-xs-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">New Home University</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*Country:</label>
										<div class="col-sm-9 col-xs-12">
										   {!! Form::select('homecountry', array(""=>"Please select") + $countryList,Input::old('homecountry'), array('id' =>
															'homecountry','class'=>'form-control selectMenu', 'autocomplete'=>'off')) !!}
											<label class="error pError">{{$errors->first('homecountry')}}</label>				 
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*City:</label>
										<div class="col-sm-9 col-xs-12">
										    {!! Form::text('homecity',Input::old('homecity'),array('id'=>'homecity','class'=>'form-control')) !!}
											<label class="error pError">{{$errors->first('homecity')}}</label>				 
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*University Name:</label>
										<div class="col-sm-9 col-xs-12">
										   {!! 	Form::text('homeuniversityName',Input::old('homeuniversityName'),array('id'=>'homeuniversityName','class'=>'form-control')) !!}
										   <label class="error pError">{{$errors->first('homeuniversityName')}}</label>					 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					 
                     <div class="form-group">
                        
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
								<label class="control-label" for="pwd">Matriculation Year (format: YYYY) : </label>
							</div>
                        <div class="col-sm-9 col-xs-12">
                           {!! Form::text('matriculationYear',Input::old('matriculationYear')!=''?Input::old('matriculationYear'):(@$exchangeDetail->matriculationYear!=''?@$exchangeDetail->matriculationYear:''),array('id'=>'matriculationYear','class'=>'form-control')) !!}
						    <label class="error pError">{{$errors->first('matriculationYear')}}</label>
                        </div>
                        </div>
                     </div>
                     
					 
                     <div class="form-group type3-4" {{ Input::old('type')=='3' || Input::old('type')=='4' || @$exchangeDetail->type=='3' || @$exchangeDetail->type=='4'?'style=display:none;':''}}>
                        <div class="row">
								 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
									<label class="control-label" for="pwd">Host University : </label>
								</div>
                        <div class="col-sm-9 col-xs-12">
						   {!! Form::select('hostUniversityID', array(""=>"Please select") + $hostUnivList,Input::old('hostUniversityID')!=''?Input::old('hostUniversityID'):(@$exchangeDetail->hostUniversity->id!=''?@$exchangeDetail->hostUniversity->id:''), array('id' =>
											'hostUniversityID','class'=>'form-control selectMenu', 'autocomplete'=>'off')) !!}
						   <label class="error pError">{{$errors->first('hostUniversityID')}}</label>			 				
											
                        </div>
                        </div>
                     </div>
					 
                     <div class="form-group type3-4 hostCountryBlk" {{ Input::old('type')=='3' || Input::old('type')=='4' || @$exchangeDetail->type=='3' || @$exchangeDetail->type=='4'?'style=display:none;':''}}>
                       	<div class="row">
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
								<label class="control-label " for="pwd">Host Country : </label>
							</div>
                        <div class="col-sm-9 col-xs-12">
                             {!! Form::text('hostCountry',Input::old('hostCountry')!=''?Input::old('hostCountry'):(@$exchangeDetail->hostUniversity->city->country->countryName!=''?@$exchangeDetail->hostUniversity->city->country->countryName:''),array('id'=>'hostCountry','class'=>'form-control', 'readonly'=>'readonly')) !!}
							 
							 
                        </div>
                        </div>
                     </div>
					 
					  <div id="newHostUniversityDiv" class="form-group type3-4" style="display:{{ Input::old('hostUniversityID')=='1'?'block':'none'}};">
						 <label for="" class="control-label col-sm-3 "></label>
						<div class="col-sm-9 col-xs-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">New Host University</h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*Country:</label>
										<div class="col-sm-9 col-xs-12">
										   {!! Form::select('hostNewcountry', array(""=>"Please select") + $countryList,Input::old('hostNewcountry'), array('id' =>
															'hostNewcountry','class'=>'form-control selectMenu', 'autocomplete'=>'off')) !!}
											 <label class="error pError">{{$errors->first('hostNewcountry')}}</label>				 
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*City:</label>
										<div class="col-sm-9 col-xs-12">
										    {!! Form::text('hostcity',Input::old('hostcity'),array('id'=>'hostcity','class'=>'form-control')) !!}
											 <label class="error pError">{{$errors->first('hostcity')}}</label>					 
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-sm-3 ">*University Name:</label>
										<div class="col-sm-9 col-xs-12">
										   {!! 	Form::text('hostuniversityName',Input::old('hostuniversityName'),array('id'=>'hostuniversityName','class'=>'form-control')) !!}
													 <label class="error pError">{{$errors->first('hostuniversityName')}}</label>			 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group type3-4" {{ Input::old('type')=='3' || Input::old('type')=='4' || @$exchangeDetail->type=='3' || @$exchangeDetail->type=='4' ?'style=display:none;':''}}>
						<div class="row">
							 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rud_spa">
								<label class="control-label" for="pwd">School Term : </label>
							</div>
                        <div class="col-sm-9 col-xs-12">
                            {!! Form::select('exchangeTerm', array(""=>"Please select", "Spring 2017"=>"Spring 2017", "Summer 2017"=>"Summer 2017", "Fall 2017"=>"Fall 2017", "Winter 2017"=>"Winter 2017", "Spring 2016"=>"Spring 2016", "Summer 2016"=>"Summer 2016", "Fall 2016"=>"Fall 2016", "Winter 2016"=>"Winter 2016", "Spring 2015"=>"Spring 2015", "Summer 2015"=>"Summer 2015", "Fall 2015"=>"Fall 2015", "Winter 2015"=>"Winter 2015", "Spring 2014"=>"Spring 2014", "Summer 2014"=>"Summer 2014", "Fall 2014"=>"Fall 2014", "Winter 2014"=>"Winter 2014", "Spring 2013"=>"Spring 2013", "Summer 2013"=>"Summer 2013", "Fall 2013"=>"Fall 2013", "Winter 2013"=>"Winter 2013", "Spring 2012"=>"Spring 2012", "Summer 2012"=>"Summer 2012", "Fall 2012"=>"Fall 2012", "Winter 2012"=>"Winter 2012"),Input::old('exchangeTerm')!=''?Input::old('exchangeTerm'):(@$exchangeDetail->exchangeTerm!=''?@$exchangeDetail->exchangeTerm:''), array('id' =>
											'exchangeTerm','class'=>'form-control selectMenu', 'autocomplete'=>'off')) !!}
							 <label class="error pError">{{$errors->first('exchangeTerm')}}</label>				
                        </div>
                        </div>
                     </div>
					 <!-- <span class="asteriskMark">Fields marked with asterisk (*) are compulsory. </span>-->

					 <div class="form-group">
						<label class="control-label col-sm-3" for="pwd"></label>
						<div class="col-sm-9 col-xs-12">
						  <button type="submit" class="btn btn-default">Submit</button>
						  <a href="{{url('/home')}}" class="btn btn-default">Cancel</a>
						</div>
					 </div>
                
		  </div>
		  </div>
		  
		    </form>
		  
		</div>
	  </div>
</div>
  <img src="{{ asset('/public/img/cloud.png') }}" class="img-back">
</div>
@stop
