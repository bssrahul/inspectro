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
		return view('home.index',compact('services'));
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
	
	   session_start();
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
	   $compQues = DB::table('questions')->where('service_id',$CqueParent->id)->get();
	  
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
				->select(array('questions.*','option_type.*'))
				->leftjoin('option_type', 'questions.form_type_id', '=', 'option_type.id')
				->where('questions.id',$Qid)
				->first();
		
		$answers=DB::table('answers')
				->select(array('answers.*'))
				->where('answers.question_id',$Qid)
				->get();
		//print_r($answers);die;
	    $formtype=$queData->op_type;
	   $serviceId=$queData->service_id;
		}
	 // print_r($formtype);die;
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
				  <p class="phead queTitle"  id='.$queData->id.'>'.$queData->title.'</p>
				  
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
							 $popup .=   '<select class="form-control">';	
							}
				//print_r($answers);
					 foreach($answers as $k=>$v){
						  if($formtype=='Multi Select')
							{
						     $popup .=   '<li><input type="checkbox" class="childbox"  data-next="'.$v->next_question_id.'" name="ck['.$k.']" value="'.$v->id.'">'.$v->answers.'</li>';
							}
							if($formtype=='Single  Select')
							{
							 $popup .=   '<li><input type="radio" class="childbox"  name="rd" data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</li>';	
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option class="childbox['.$k.']"  data-next="'.$v->next_question_id.'" value="'.$v->id.'">'.$v->answers.'</option>';	
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
			$popup .=   '<li class="other" ><input type="text" placeholder="Other">
					<div class="error-box"><p>Fill Details</p></div>
				   </li>';
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
	   session_start();
	   $inputData=json_decode( $_REQUEST['data'], true );
	   //print_r($inputData['options']);die;
	   $options=json_encode($inputData['options']);
	   if(!isset($_SESSION['userTmpId']) && $_SESSION['userTmpId'] =='')
	   {
			$_SESSION['userTmpId']=rand(111,99999);
	   }
	   
	   DB::table('localstorage')->insert(['service_id' => $inputData['serviceId'],'user_temp_id'=>$_SESSION['userTmpId'],'question_id'=>$inputData['QId'],'options'=>$options]);
	   die;
	}
}
