<?php namespace App\Http\Controllers;
use Auth;
use App\User;
use Session;
use DB;
class HomeController extends Controller {
	
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
		parent::__construct();
		
		
			
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$services = DB::table('services')->select('title','id')->take(3)->get();
		//print_r($services);die;
		$howItWorkData= DB::table('static_blocks')->where('type','process')->where('status','1')->get();
		//echo "<pre>"; print_r($howItWorkData);die;
		$ourServicesData= DB::table('static_blocks')->where('type','services')->where('status','1')->get();
		//echo "<pre>"; print_r($ourServicesData);die;
		$ourFeaturesData= DB::table('static_blocks')->where('type','features')->where('status','1')->get();
		//echo "<pre>"; print_r($ourFeaturesData);die;
		$ourTestimonialData= DB::table('static_blocks')->where('type','testimonial')->where('status','1')->get();
		//echo "<pre>"; print_r($ourTestimonialData);die;
		return view('home.index',compact('services','howItWorkData','ourServicesData','ourFeaturesData','ourTestimonialData'));
	
	}
	/**
	 * Show Popup Box for question to the user.
	 *
	 * @return Response
	 */
	public function serviceList()
	{
		$serviceId=$_REQUEST['serviceId'];
		$FirstQue = DB::table('questions')->where('service_id',$serviceId)->where('sort_que',1)->first();
		
		if(isset($serviceId)&& !empty($serviceId)){
		$popup='<div class="modal-dialog popup-1">	
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
				<input type="button" value="NEXT"  class="btn btn-success submit nextQue"  data-serviceId="'.$serviceId.'" data-qid="'.$FirstQue->id.'">		
				</div>
		<!--/Popup footer-->
				</div>
				</div>      
				</div>';
		
		echo $popup;
		}
		die;
	}

   public function nextQue()
   {
	   if(isset($_REQUEST['serviceId'])){
	   $serviceId=$_REQUEST['serviceId'];
	   }
	
	  
	   $_SESSION['serviceId']=$serviceId;
	  
	   if(isset($_REQUEST['backQid'])){
		   $backQid=$_REQUEST['backQid'];
		   $_SESSION['backQid']=$backQid;
		// echo "<script> alert($backQid); </script>";
	  
		//echo "backQid".gettype($backQid);
   //  echo"ghgggggggggggggggggggggggggg"; print_r($backQid);
	
	  //die;
	  $Qid = $_REQUEST['Qid'];
	  $_SESSION['Qid']=$Qid;
	   //$questions = DB::table('questions')->where('service_id',$serviceId)->get();
	   $CqueParent = DB::table('services')->where('title','Common Ques')->first();
	   $compQues   = DB::table('questions')->where('service_id',$CqueParent->id)->get();
	   if(isset($_SESSION['userTmpId'])){
		   
		   $checkEntry = DB::table('localstorage')
						->where('service_id',$serviceId)
						->where('user_temp_id',$_SESSION['userTmpId'])
						->get();
	   }
	   
			
		/* foreach($questions as $k=>$v)
		{
		  $Qids[]=$v->id;
		}
		foreach($compQues as $k=>$v)
		{
		  $CQids[]=$v->id;
		}
		$Qids=array_unique(array_merge($Qids,$CQids));
		print_r($Qids);
		$key=array_search($Qid,$Qids);
		if($key < count($Qids)){
		$i=$key+1;
		}
		if($key>0){
		$j=$key-1;
		} */
		if(!empty($Qid)){
		$queData = DB::table('questions')
				->select(array('questions.*','option_type.*','questions.id AS que_id'))
				->leftjoin('option_type', 'questions.form_type_id', '=', 'option_type.id')
				->where('questions.id',$Qid)
				->first();
		$_SESSION['lastdynamicQID'] = $queData->que_id;
		$answers=DB::table('answers')
				->select(array('answers.*'))
				->where('answers.question_id',$Qid)
				->get();
		//print_r($answers);die;
	    $formtype=$queData->op_type;
	   $serviceId=$queData->service_id;
		}
	 // print_r($formtype);die;
	 if(isset($checkEntry))
	 {
		 foreach($checkEntry as $k=>$v)
		{
			
			if($v->question_id==$queData->que_id && !empty($v->options))
			{
				$options=json_decode($v->options,true);
				//echo "<pre>"; print_r($options);
			}
		} 
	 }
		
	   $popup='<div class="modal-dialog popup-1">	
				<div class="modal-content">  
				<div class="inner-popup">
		<!--popup head-->
					<div class="pop-head">
					<!--progress-->
					<div class="top-progress">
						  <div class="progress">
							  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:20%">
								20% Completed 
							  </div>
						   </div>
					  </div>
		  <!--progress-->
				  <p class="phead queTitle"  id='.$queData->que_id.'>'.$queData->title.'</p>
				  
				  <div class="top-desc">
					<p>'.$queData->description_1.'</p>
				  </div>
					</div>
		<!--/popup head-->
		<!--popup Content-->
			<div class="popup-cont">
				 <ul class="plist">';
				if($formtype=='Drop Down')
							{
							 $popup .= '<select class="form-control childbox" id="selectAns"><option>Select your answer</option>';	
							}
				//print_r($answers);
		if(isset($options) && !empty($options)){
				//
					 foreach($answers as $k=>$v){
						 
						if(isset($options)){
							if(in_array($v->id,$options))
							{
								$checked='checked = "checked"';
								$selected='selected';
							}else{
								$checked='';
								$selected='';
							}
						}
							
							
						  if($formtype=='Multi Select')
							{	
							 $popup .=   '<li><input type="checkbox" class="childbox" '.$checked.' data-next="'.$v->next_question_id.'" name="ck['.$k.']" value="'.$v->id.'">'.$v->answers.'<a title="Lorem Ipsum is simply dummy text of the printing and typesetting industry." data-placement="top" data-toggle="tooltip" href="#" class="test">
       	    <img width="14" height="14" alt="" src="img/tt-icon.png"> </a></li>';
							}
							if($formtype=='Single  Select')
							{
							 $popup .=   '<li><input type="radio" class="childbox" '.$checked.' name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</li>';	
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option class="childbox" '.$selected.' data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</option>';	
							}
							if($v->custom_answer=="text")
							{
							 $popup .= '<li class="other" ><input class="innerAns" name="innerAns['.$k.']"  type="text" placeholder="Enter your details">
										<div class="error-box"><p>Fill Details</p></div>
										</li>';
							}
				        }
							if($formtype=='Drop Down')
							{
							 $popup .= '</select>';	
							}
								 
		if($queData->other_custom_field==1)
		{
			$popup .=   '<li class="other" ><input type="text" name="customAns" placeholder="Other">
					<div class="error-box"><p>Fill Details</p></div>
				   </li>';
		}
	   }else{   
				foreach($answers as $k=>$v){
						  if($formtype=='Multi Select')
							{	
							 $popup .=   '<li><input type="checkbox" class="childbox"  data-next="'.$v->next_question_id.'" name="ck['.$k.']" value="'.$v->id.'">'.$v->answers.'<a title="Lorem Ipsum is simply dummy text of the printing and typesetting industry." data-placement="top" data-toggle="tooltip" href="#" class="test">
       	    <img width="14" height="14" alt="" src="img/tt-icon.png"> </a></li>';
							}
							if($formtype=='Single  Select')
							{
							 $popup .=   '<li><input type="radio" class="childbox"  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</li>';	
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option class="childbox"  data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</option>';	
							}
							if($v->custom_answer=="text")
							{
							 $popup .= '<li class="other" ><input class="innerAns" name="innerAns['.$k.']"  type="text" placeholder="Enter your details">
										<div class="error-box"><p>Fill Details</p></div>
										</li>';
							}
				        }
				if($formtype=='Drop Down')
							{
							 $popup .=   '</select>';	
							}
								 
		if($queData->other_custom_field==1)
		{
			$popup .=   '<li class="other" ><input type="text" name="customAns" placeholder="Other">
					<div class="error-box"><p>Fill Details</p></div>
				   </li>';
		}
	   }
	   
			$popup .=  '</ul>
				 <div class="bot-desc">
					<p>'.$queData->description_1.'</p>
				 </div>
				</div>
			<!--/popup Content-->
			<!--Popup footer-->
			<div class="popup-foot">';
			// print_r($v->next_question_id);
			// if($v->next_question_id==0)
			// {
				// $popup .= '<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-current_id="'.$Qid.'" data-serviceId='.$serviceId.'  id="myBtn3">';
			// }
				$popup .= '<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-current_id="'.$Qid.'" data-serviceId='.$serviceId.'>';
				//$popup .= '<input type="submit" value="Submit" class="btn btn-success submit " data-serviceId='.$serviceId. ' id="myBtn3">';
				if($backQid!='undefined'){
				$popup .= '<a href="javascript:void(0)"  title="Back" data-serviceId='.$serviceId.' data-qid="'.$backQid.'"  class="back"> < Back</a>';}
				$popup .= '</div>
			<!--/Popup footer-->
				</div>
			   </div>      
			 </div>';
			 echo $popup;die;
	   
   }
}

	public function localStorage()
	{
	  
	   $inputData=json_decode( $_REQUEST['data'], true );
		//print_r("input data qid".$_SESSION['userTmpId']);die;
	   $options = json_encode($inputData['options']);
	   if(!isset($_SESSION['userTmpId']))
	   {
		  
			$_SESSION['userTmpId']= rand(111,99999);
	   }
	   if(isset($inputData['QId'])){
	   $checkEntry = DB::table('localstorage')
						->where('service_id',$inputData['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->where('question_id',$inputData['QId'])
						->delete();
	   
	   DB::table('localstorage')->insert(['service_id' => $inputData['serviceId'],'user_temp_id'=>$_SESSION['userTmpId'],'question_id'=>$inputData['QId'],'options'=>$options]);
	   }die;
	}
	
	public function stQfrontStorage()
	{
		$staticModal = $_REQUEST['staticModal'];	
		
		if(@$staticModal!=''){
			
			if(@$_SESSION['serviceId'] && $_SESSION['userTmpId']){
				$checkEntry = DB::table('localstorage')
							->where('service_id',$_SESSION['serviceId'])
							->where('user_temp_id',$_SESSION['userTmpId'])
							->get();
						if($checkEntry!=0)
			{
				foreach($checkEntry as $key=> $value){
				$options=json_decode($value->options,true);
				foreach($options as $k=>$v)
				{
					if(isset($options[$k]['zip'])){ 
					 $zip = $options[$k]['zip'];}
					 
					if(isset($options[$k]['serviceDate'])){ 
						$serviceDate = $options[$k]['serviceDate'];
						$sel='selected';
					 }
					if(isset($options[$k]['selected_date'])){ 
						$serviceDate = 'selected_date';
						$date=$options[$k]['selected_date'];
					 }
					 
					 if(isset($options[$k]['TellusData'])){ 
						//$serviceDate = 'selected_date';
						$TellusData=$options[$k]['TellusData'];
					 }
					 
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
		
				/*HardCoded*/
				if($staticModal=='0'){
					
					$modalData='<div class="modal-dialog popup-1">	
						   <div class="modal-content">  
							<div class="inner-popup">
							<!--popup head-->
								<div class="pop-head">
								<!--progress-->
								<div class="top-progress">
									  <div class="progress">
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
											70% Completed 
										  </div>
									   </div>
								  </div>
								<!--progress-->
							  <p class="phead queTitle" id="0">When do you need Service? </p>
								</div>
							<!--/popup head-->
							<!--popup Content-->
						<div class="popup-cont">
							 <ul class="plist-2">
							   <li class="option"> 
							   <select class="form-control childbox" id="selectTime">
									<option value="" '.(@$serviceDate?'':'selected="selected"').'>Select option</option>
									<option value="flexible_time" class="childbox" '.(@$serviceDate=='flexible_time'?'selected="selected"':'').'>I\'m flexible</option>
									<option value="next_few_days" class="childbox" '.(@$serviceDate=='next_few_days'?'selected="selected"':'').'>In the next few days</option>
									<option value="immediate" class="childbox" '.(@$serviceDate=='immediate'?'selected="selected"':'').'>As soon as possible</option>
									<option value="selected_date" class="childbox" '.(@$serviceDate=='selected_date'?'selected="selected"':'').'>On one particular date</option>
									
								</select>
					  
					<ul class="drop-list">
						<li><label>Best date(s) and time(s) for painting</label>
							 <input type="text" name="date" class="childbox for_date" id="datepicker"  placeholder="Click to pick a date" value='.(@$date?$date:'').'>
							 <div class="errorBbox"></div>
						</li>
					<ul>  
					  </li>
							   
							 </ul>
						</div>
						<!--/popup Content-->
						<!--Popup footer-->
						<div class="popup-foot">
						<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-qid="p2" data-current_id="0" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
						<a class="back"  data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid='.(@$_SESSION['lastdynamicQID']?$_SESSION['lastdynamicQID']:'').' title="Back" href="javascript:void(0)">Back</a>
						</div>
						<!--/Popup footer-->

							</div>
						   </div>      
						 </div>';
				}else if($staticModal=='p2'){	
						$modalData='<div class="modal-dialog popup-1">	
							   <div class="modal-content">  
								<div class="inner-popup">
									<!--popup head-->
									<div class="pop-head">
									<!--progress-->
									<div class="top-progress">
										  <div class="progress">
											  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%">
												80% Completed
											  </div>
										   </div>
									  </div>
									<!--progress-->
								  <p class="phead queTitle" id="p2">Anything else We should<br> know?</p>
									</div>
						<!--/popup head-->
						<!--popup Content-->
							<div class="popup-cont">
								 <ul class="plist">
								   <li><input name="customInfo" '.(@$TellusData!=''?'checked':'').' id="customInfoYes" class="childbox tellusData customInfoYes" type="radio"> Yes</li>
								   <li><input name="customInfo" '.(@$TellusData==''?'checked':'').' id="customInfoNo" class="childbox tellusData customInfoNo" type="radio"> No</li>		   
								   <li><textarea class="txtarea" name="TellUs" id="TellUs" class="childbox" placeholder="Tell us more" '.(@$TellusData!=''?'':'style="display:none;"').'>'.(@$TellusData?$TellusData:'').'</textarea>
									 <div class="error-box"><p>Fill Details</p></div>
								   </li>		   
								 </ul>
							</div>
						<!--/popup Content-->
						<!--Popup footer-->
							<div class="popup-foot">
							<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-qid="p3" data-current_id="p2" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
							<a class="back"  data-serviceId = '.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid="0" title="Back" href="javascript:void(0)">Back</a>
							</div>
						<!--/Popup footer-->

								</div>
							   </div>      
							 </div>';
										
				}else if($staticModal=='p3'){
					$modalData = '<div class="modal-dialog popup-1">
								<div class="modal-content">  
									<div class="inner-popup">
										<div class="pop-head">
										<!--progress-->
										<div class="top-progress">
											  <div class="progress">
												  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:90%">
													90% Completed
												  </div>
											   </div>
										  </div>
										
									  <p class="phead queTitle" id="p3">Please confirm where you need <br>the service.   </p>
										</div>
									
								<div class="popup-cont">
									 <ul class="plist">
									   <li class="option">
									   <input type="text" name="zip" class="txt childbox for_zip" id="ZipInput" placeholder="Zip Code" value='.(@$zip?$zip:'').'>
											<div class="errorBox"></div>
									   </li>
									   
									 </ul>
								</div>
								
								<div class="popup-foot">
									<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-qid="p4" data-current_id="p3" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
									<a class="back"  data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid="p2" title="Back" href="javascript:void(0)">Back</a>
								</div>
								

									</div>
								   </div>      
								 </div>';
					
				}else if($staticModal=='p4'){
					$modalData = '<div class="modal-dialog popup-1" >	
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
										
												<p class="phead queTitle" id="p4">How would you like to hear from professionals? </p>
											</div>
												
											<div class="popup-cont">
												 <ul class="plist-2">		
														<li>
															<div class="option-txt">
															<p class="phead">  </p>
															<input type="radio" name="comm_medium" class="childbox" id="email" '.@$emailOnly.'> I want quotes by email only</br>
															<input type="radio" name="comm_medium" class="childbox" id="email_text" '.@$email_text.'> I want quotes by email and text message
															<p> By selecting this option, you electronically authorize Inspectaro to send you automated text messages to notify you of quotes from Inspectaro pros. Receiving text messages is optional. </p>
															</div>
															
															<label class="for_email_label" '.(@$emailOnly=='checked' || @$email_text=='checked'?'style="display:block;"':'style="display:none;"').'> What\'s your email address? </label>
															<input type="text" name="email"   class="for_email childbox" placeholder="Enter Email Id" '.(@$emailOnly=='checked' || @$email_text=='checked'?'style="display:block;"':'style="display:none;"').' value='.@$email.'>
															<div class="errorBox for_email"></div>
													  
															<label class="for_phone_label" '.(@$email_text=='checked'?'style="display:block;"':'style="display:none;"').'>Phone number </label>
															<input type="text" name="phone"  class="for_phone childbox" placeholder="Ex. 9864646456" '.(@$email_text=='checked'?'style="display:block;"':'style="display:none;"').' value='.@$phone.'>	
															<div class="errorBox for_phone"></div>
														</li>
											
												 </ul>
											</div>
										
									<div class="popup-foot">
										<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-qid="p5" data-current_id="p4" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
										<a class="back"  data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid="p3" title="Back" href="javascript:void(0)">Back</a>	
									</div>
									

										</div>
									   </div>      
									 </div>';
				}
				 else if($staticModal=='p5'){
					$modalData ='<div class="modal-dialog popup-1">	
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
									  <p class="phead queTitle" id="p5">Please enter your full name.  </p>
										</div>
									<!--/popup head-->
									<!--popup Content-->
								<div class="popup-cont">
									 <ul class="plist">
									   <li class="option">
									   <input type="text" name="name" class="txt childbox" placeholder="First and Last Name" value='.(@$name?$name:'').'> 
										<div class="errorBox"></div>
									   </li>
									   
									 </ul>
								</div>
								<!--/popup Content-->
								<!--Popup footer-->
								<div class="popup-foot">
									<input type="submit" id="sendReq" value="Send Request" class="btn btn-success submit nextQue" data-qid="p6" data-current_id="p5" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
									<a class="back"  data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid="p4" title="Back" href="javascript:void(0)">Back</a>
									
									<div class="tc-area">
										<p> By clicking Get Quotes you agree to Thumbtack\'s
							 <span><a href="" title="Terms of Services">Terms of Service</a> and <a href="" title="Privacy Policy"> Privacy Policy. </a></span>
							<a hrea="" title="" title="Contact Us">Contact us</a> if you have any questions or concerns.
							</p>
									</div>
								</div>
								<!--/Popup footer-->

									</div>
								   </div>      
								 </div>';
				 } else
				{
					$modalData ='<div class="modal-dialog popup-1" >	
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
								<input type="submit" value="Whats Next" class="btn btn-success submit" data-current_id="p6" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').'>
								<a class="cancelProject" id="CancelProject" data-serviceId='.(@$_SESSION['serviceId']?$_SESSION['serviceId']:'').' data-qid="p5" title="Back" href="javascript:void(0)">Cancel Project</a>
							</div>
						<!--/Popup footer-->
								</div>
							   </div>      
							 </div>';
				}
				
				
				/*HardCoded*/			
			}
			return $modalData;
		}	

	}
	public function sendRequest()
	{
		$zip='';
		$email='';
		$name='';
		$phone='';
		if(@$_SESSION['serviceId'] && $_SESSION['userTmpId']){
				$checkEntry = DB::table('localstorage')
							->where('service_id',$_SESSION['serviceId'])
							->where('user_temp_id',$_SESSION['userTmpId'])
							->get();
			if($checkEntry!=0)
			{
				foreach($checkEntry as $key=> $value){
					//print_r($value);	
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
					 
				}
		}
		//print_r($checkEntry);die;
		foreach($checkEntry as $key=> $value){
			$qid = trim($value->question_id);
			
			if($qid == 0 || $qid == 'p2' || $qid == 'p3')
			{
				continue;
			}else{	
				$index=array('qid');
				$values=array($qid);
				$mainArr=array();
				$options=json_decode($value->options,true);
				foreach($options as $k=>$v)
				{	
					array_push($index,"op".++$k);
					array_push($values,$v);
					
					//$arr=array('op'.$k+1=>$v);
					//$mainArr[]=$arr;	
				}
				$temp[]=array_combine($index,$values);
				//echo "<pre>";
				//print_r($value->question_id);
		
			}
	}
	if(@$temp)
	{
		$selected_options=json_encode($temp);
		$entry=DB::table('quote_requests')->insert(['full_name' => $name,'service_id'=>$_SESSION['serviceId'],'user_temp_id'=>$_SESSION['userTmpId'],'email'=>$email,'phone_no'=>$phone,'zipcode'=>$zip,'selected_options'=>$selected_options]);

	}
		
		}}
		if($entry)
		{
				DB::table('localstorage')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->delete();
				echo "success";
		}
		
		
		return;
}

public function cancelProject()
{
	if(isset($_SESSION['userTmpId']))
	{
		DB::table('quote_requests')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->delete();
		DB::table('localstorage')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->delete();
	}
	
}
}
