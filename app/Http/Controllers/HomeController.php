<?php namespace App\Http\Controllers;
use Auth;
use App\User;
use Session;
use DB;
use Mail;

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
		
		$services = DB::table('services')->select('title','id')->where('status',1)->take(7)->get();
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
		
		$totalQofService = DB::table('questions')->where('service_id',$serviceId)->lists('id');
		
		$totalQofServiceJson = json_encode($totalQofService,JSON_NUMERIC_CHECK);
		
	
		
		$FirstQue = DB::table('questions')->where('service_id',$serviceId)->where('sort_que',1)->first();
		//print_r($FirstQue);die;
		if(isset($serviceId)&& !empty($serviceId) && !empty($FirstQue)){
		$popup='<div class="modal-dialog popup-1">
				<input type="hidden" value='.$totalQofServiceJson.' id="serviceTotalQ" name="serviceTotalQ">
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
		}else{
			echo 0;
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
		
	  $Qid = $_REQUEST['Qid'];
	  $_SESSION['Qid']=$Qid;
	   //$questions = DB::table('questions')->where('service_id',$serviceId)->get();
	   $CqueParent = DB::table('services')->where('title','Common Ques')->first();
	   $compQues   = DB::table('questions')->where('service_id',@$CqueParent->id)->get();
	   if(isset($_SESSION['userTmpId'])){
		   
		   $checkEntry = DB::table('localstorage')
						->where('service_id',$serviceId)
						->where('user_temp_id',$_SESSION['userTmpId'])
						->get();
	   }
	   
			
		
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
	 //echo '<pre>';print_r($checkEntry);die;
	 if(isset($checkEntry))
	 {
		 foreach($checkEntry as $k=>$v)
		{
			
			if($v->question_id==$queData->que_id && !empty($v->options))
			{
				$options=json_decode($v->options,true);
				
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
							  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
								
							  </div>
						   </div>
					  </div>
		  <!--progress-->
				  <p class="phead queTitle"  id='.$queData->que_id.'>'.$queData->title.'</p>
				  
				  <div class="top-desc">
					<p>'.@$queData->description_1.'</p>
				  </div>
					</div>
		<!--/popup head-->
		<!--popup Content-->
			<div class="popup-cont">';
				if($formtype=='Drop Down')
				{
					$popup .= '<ul class="plist-2"><li class="option"><select class="form-control childbox" id="selectAns"><option>Select your answer</option>';	
				}else{
					$popup .='<ul class="plist">';
				}
				//print_r($answers);
		if(isset($options) && !empty($options)){
				//
					 foreach($answers as $k=>$v){
						 
						if(isset($options)){
							$customAnswerText = '';
							foreach($options as $optKey=>$optVal){
								if(@$optVal['answerId']==$v->id){
									$customAnswerText = $optVal['customAnswer'];
								}
							}
							if(in_array($v->id,$options))
							{
								//$customAnswerVal = answerId
								$checked='checked = "checked"';
								$selected='selected';
							}elseif($customAnswerText!=''){
								$checked='checked = "checked"';
								$selected='selected';
							}else{
								$checked='';
								$selected='';
							}
						}
							
							
						  if($formtype=='Multi Select')
							{	
							
			
								if($v->custom_answer == "text") {
								$popup .= '<li class="other" ><span><input type="checkbox" '.$checked.' class="childbox required customAnswer"  name="ck['.$k.']" data-next="'.$v->next_question_id.'" value="'.$v->id.'"></span><input class="'.(@$checked?'required':'').' customAnswerText" name="innerAns['.$k.']"  type="text" placeholder="'.$v->answers.'" value='.$customAnswerText.'>
											<div class="error-box"><p>Fill Details</p></div>
											</li>';
											
								}else{
									$popup .=   '<li class="actionPerform"><input type="checkbox" class="childbox required" '.$checked.' data-next="'.$v->next_question_id.'" name="ck['.$k.']" value="'.$v->id.'">'.$v->answers.'<a title="'.$v->option_description.'" data-placement="top" data-toggle="tooltip" href="#" class="test">
												<img width="14" height="14" alt="" src="public/img/tt-icon.png"> </a></li>';
								}
			
							}
							if($formtype=='Single  Select')
							{
								if($v->custom_answer == "text") {
								 $popup .= '<li class="other actionPerform" ><span><input type="radio" class="childbox required customAnswer" '.$checked.'  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'"></span><input class="'.(@$checked?'required':'').' customAnswerText" name="innerAns['.$k.']"  type="text" placeholder="'.$v->answers.'" value='.$customAnswerText.'>
											<div class="error-box"><p>Fill Details</p></div>
											</li>';
											
								}else{
									$popup .=   '<li class="actionPerform"><input type="radio" class="childbox required" '.$checked.'  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</li>';	
								}	
							 
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option class="childbox" '.$selected.' data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</option>';	
							}
							
				        }
							if($formtype=='Drop Down')
							{
							 $popup .= '</select></li>';	
							}
								 
		if($queData->other_custom_field==1)
		{
			$popup .=   '<li class="other" ><input type="text" name="customAns" placeholder="Other">
					<div class="error-box"><p>Fill Details</p></div>
				   </li>';
		}
	   }else{   
				foreach($answers as $k=>$v){
					echo 'answertype'.$v->custom_answer;
						  if($formtype=='Multi Select')
							{	
								
			
								if($v->custom_answer == "text") {
								$popup .= '<li class="other actionPerform" ><span><input type="checkbox" class="childbox customAnswer"  name="ck['.$k.']" data-next="'.$v->next_question_id.'" value="'.$v->id.'"></span><input class="customAnswerText" name="innerAns['.$k.']"  type="text" placeholder="'.$v->answers.'">
											<div class="error-box"><p>Fill Details</p></div>
											</li>';
											
								}else{
									$popup .=   '<li class="actionPerform"><input type="checkbox" class="childbox "  data-next="'.$v->next_question_id.'" name="ck['.$k.']" value="'.$v->id.'">'.$v->answers.'<a title="'.$v->option_description.'" data-placement="top" data-toggle="tooltip" href="#" class="test">
												<img width="14" height="14" alt="" src="public/img/tt-icon.png"> </a></li>';
								}
			
							}
							if($formtype=='Single  Select')
							{
								if($v->custom_answer == "text") {
								 $popup .= '<li class="other actionPerform" ><span><input type="radio" class="childbox customAnswer"  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'"></span><input class="customAnswerText" name="innerAns['.$k.']"  type="text" placeholder="'.$v->answers.'">
											<div class="error-box"><p>Fill Details</p></div>
											</li>';
											
								}else{
									$popup .=   '<li class="actionPerform"><input type="radio" class="childbox"  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</li>';	
								}
								
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option class="childbox required"  data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</option>';	
							}
							
							
				        }
				if($formtype=='Drop Down')
							{
							 $popup .=   '</select>';	
							}
								 
		if($queData->other_custom_field==1)
		{
			$popup .=  '<li class="other" ><input type="text" name="customAns" class="required" placeholder="Other">
					<div class="error-box"><p>Fill Details</p></div>
				   </li>';
		}
	   }
	   
			$popup .=  '</ul>
				 <div class="bot-desc">
					<p>'.@$queData->description_2.'</p>
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
					if(isset($options[$k]['selected_time'])){ 
						//$serviceDate = 'selected_time';
						$time=$options[$k]['selected_time'];
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
										  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
											
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
							 <input type="text" name="date" class="childbox for_date" id="datepicker" readonly="readonly"  placeholder="Click to pick a date" value='.(@$date?$date:'').'>
							 <div class="error-box marginL0"></div>
						</li>
						<li><label>At what time?</label>
							<div class="input-group bootstrap-timepicker timepicker">
							<input type="text" placeholder="Ex. “2pm”" id="timepicker1" readonly class="form-control input-small" value='.(@$time?$time:'').'>
							
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-time"></i>
							</span>
							
							 </div> 
							<div class="error-box marginL0"><p>Fill Details</p></div>							 
							
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
											  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
												
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
								   <li class="actionPerform"><input name="customInfo" '.(@$TellusData!=''?'checked':'').' id="customInfoYes" class="childbox tellusData customInfoYes" type="radio"> Yes</li>
								   <li class="actionPerform"><input name="customInfo" '.(@$TellusData==''?'checked':'').' id="customInfoNo" class="childbox tellusData customInfoNo" type="radio"> No</li>		   
								   <li class="actionPerform"><textarea class="txtarea" name="TellUs" id="TellUs" class="childbox" placeholder="Tell us more" '.(@$TellusData!=''?'':'style="display:none;"').'>'.(@$TellusData?$TellusData:'').'</textarea>
									 <div class="error-box marginL0"><p>Fill Details</p></div>
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
												  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
													
												  </div>
											   </div>
										  </div>
										
									  <p class="phead queTitle" id="p3">Please confirm where you need <br>the service.   </p>
										</div>
									
								<div class="popup-cont">
									 <ul class="plist">
									   <li class="option">
									   <input type="text" maxlength="5" name="zip" class="txt childbox for_zip zip" id="ZipInput" placeholder="Zip Code" value='.(@$zip?$zip:'').'>
											<div class="error-box marginL0"><p></p></div>
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
													  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
														
													  </div>
												   </div>
												</div>
										
												<p class="phead queTitle" id="p4">How would you like to hear from professionals? </p>
											</div>
												
											<div class="popup-cont">
												 <ul class="plist-2">		
														<li class="actionPerform">
															<div class="option-txt">
															<p class="phead">  </p>
															<input type="radio" name="comm_medium" class="childbox emailCheck" id="email" '.@$emailOnly.'> I want quotes by email only</br>
															<input type="radio" name="comm_medium" class="childbox emailCheck" id="email_text" '.@$email_text.'> I want quotes by email and text message
															<p> By selecting this option, you electronically authorize Inspectaro to send you automated text messages to notify you of quotes from Inspectaro pros. Receiving text messages is optional. </p>
															</div>
															
															<label class="for_email_label" '.(@$emailOnly=='checked' || @$email_text=='checked'?'style="display:block;"':'style="display:none;"').'> What\'s your email address? </label>
															<input type="text" name="email"   class="for_email childbox email" placeholder="Enter Email Id" '.(@$emailOnly=='checked' || @$email_text=='checked'?'style="display:block;"':'style="display:none;"').' autocomplete="off" value='.@$email.'>
															<div class="error-box for_email marginL0"></div>
													  
															<label class="for_phone_label" '.(@$email_text=='checked'?'style="display:block;"':'style="display:none;"').'>Phone number </label>
															<input type="text" name="phone"  class="for_phone childbox phone" placeholder="Ex. 9864646456" '.(@$email_text=='checked'?'style="display:block;"':'style="display:none;"').' value='.@$phone.'>	
															<div class="error-box for_phone marginL0"></div>
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
												  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
													
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
									   <input type="text" id="fullName" name="name" class="txt childbox name" placeholder="First and Last Name" value='.(@$name?$name:'').'> 
										<div class="error-box marginL0"></div>
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
					 if(isset($options[$k]['selected_date']) && isset($options[$k]['selected_time'])){ 
					$selected_date = $options[$k]['selected_date']. " , ".$options[$k]['selected_time'] ;}
					else
					 if(isset($options[$k]['selected_date'])){ 
					$selected_date = $options[$k]['selected_date'];}
					 if(isset($options[$k]['serviceDate'])){ 
					$selected_date = $options[$k]['serviceDate'];}
					
					if(isset($options[$k]['TellusData'])){ 
					$TellusData = $options[$k]['TellusData'];}
					 
				}
		}
			
		if(@$_SESSION['serviceId']!='' && @$_SESSION['userTmpId']!='' &&  @$name!='')
		{
			$_SESSION['cp_flag']=rand(14321,989899);
			$entry=DB::table('quote_requests')->insertGetId(['full_name' => $name,'service_id'=>$_SESSION['serviceId'],'user_temp_id'=>$_SESSION['userTmpId'],'cp_flag'=>$_SESSION['cp_flag'],'email'=>$email,'phone_no'=>$phone,'zipcode'=>$zip,'service_request_date'=>@$selected_date,'anything_else_know'=>@$TellusData]);
			
			if($entry!='') {
				
				foreach($checkEntry as $key=> $value){
					$qid = trim($value->question_id);
					
					if($qid == 0 || $qid == 'p2' || $qid == 'p3' || $qid == 'p4' || $qid == 'p5')
					{
						continue;
					}else{	
						
						$options=json_decode($value->options,true);
						
						$optionArr = array_filter($options);
						
						foreach($optionArr as $k=>$v)
						{	
							$optDataSave = array();
							$optDataSave['question_id'] = $qid;
							$optDataSave['quote_requests_id'] = $entry;
							$optDataSave['user_temp_id'] = $_SESSION['userTmpId'];
							$optDataSave['service_id'] = $_SESSION['serviceId'];
							$optDataSave['cp_flag'] = $_SESSION['cp_flag'];
							
							if(@$v['answerId'] && @$v['customAnswer']){ 
								$optDataSave['answer_id'] = $v['answerId'];
								$optDataSave['custom_answer'] = $v['customAnswer'];	
							}else{
								$optDataSave['answer_id'] = $v;
								$optDataSave['custom_answer'] = '' ;
							}
							
							$saveQuoteAnswer = DB::table('quote_requests_answers')->insert($optDataSave);
							
						}
					}
				}
					
					$userData['name']  =  $name;
					$userData['email'] =  $email;
					
					$adminData['name']  =  'Admin';
					$adminData['fromName']  =  $name;
					$adminData['fromEmail']  =  $email;
					$adminData['email'] =  'tobias@juelke.de';
					
					//$this->thankyouMail($userData,'user');
					//$this->thankyouMail($adminData,'admin');
					DB::table('localstorage')
							->where('service_id',$_SESSION['serviceId'])
							->where('user_temp_id',$_SESSION['userTmpId'])
							->delete(); 
					
					echo "success";
			}
		}
		
		}
		
		return;
	}}

public function cancelProject()
{
	if(isset($_SESSION['userTmpId']))
	{
		DB::table('quote_requests')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->where('cp_flag',$_SESSION['cp_flag'])
						->delete();
		DB::table('quote_requests_answers')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->where('cp_flag',$_SESSION['cp_flag'])
						->delete();
		
		DB::table('localstorage')
						->where('service_id',$_SESSION['serviceId'])
						->where('user_temp_id',$_SESSION['userTmpId'])
						->delete();
	}
	
}

public function sendTestMail(){
	$user['email'] = 'sukant@mobilyte.com';
	$user['name'] = 'Sukant';
	
	
	$data=array('message'=>'sdf');
		
	Mail::send('emails.reminder', array('user' => 'Sukant', 'userMessage' =>  'sdf'), function($message) use ($user) {
		$message->to($user['email'],$user['name'])->subject("dfg");
	});			
	
	echo 'sent';die;
}

public function thankyouMail($userData, $type){
	
	if(!empty($userData)){
		$data = $userData;
		if($type=='admin'){
			$subject = 'Inspectro - New Quote Request';	
			$data['message'] = 'We have recieved new quote request from '.$userData['fromName'].'('.$userData['fromEmail'].'). Kindly review the detail in admin panel & respond accordindly.';
		}else{
			$subject = 'Inspectro - Quote Request Recieved';	
			$data['message'] = 'Thanks for the request. We are working on the same will get back to you asap.';
		}
		
		
		Mail::send('emails.thank-you', compact('data'), function($message) use ($userData, $subject) {
			
			$message->to($userData['email'],$userData['name'])->subject($subject);
		});	
		
	}
	return 'success';	
}

}
