<?php namespace App\Http\Controllers;
use Auth;
use App\User;
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
		$users = DB::table('questions')->where('service_id',$serviceId)->get();
		foreach($users as $k=>$v)
		{
		 $Qids[]=$v->id;
		}
		
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
				<input type="button" value="NEXT"  class="btn btn-success submit nextQue"  data-serviceId='.$serviceId.' data-qid='.$Qids[0].'>		
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
	   $Qid=$_REQUEST['Qid'];
	   $users = DB::table('questions')->where('service_id',$serviceId)->get();
		foreach($users as $k=>$v)
		{
		  $Qids[]=$v->id;
		}
		print_r($Qids);
		print_r($Qid);
		$key=array_search($Qid,$Qids);
		print_r($key);//die;
		if($key < count($Qids)){
		$i=$key+1;
		}
		if($key>0){
		$j=$key-1;
		}
		
	   $queData = DB::table('questions')
				->select(array('questions.*','form_types.*'))
				->join('form_types', 'questions.form_type_id', '=', 'form_types.form_type_id')
				->where('questions.id',$Qid)
				//->groupBy('dn_users.city')
				//->orderBy('no_of_users')
				->first();
		//print_r($queData);
		$answers=DB::table('answers')
				->select(array('answers.*'))
				->where('answers.question_id',$Qid)
				->get();
		//print_r($answers);die;
	   $formtype=$queData->op_type;
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
				  <p class="phead" id='.$queData->id.'>'.$queData->title.'</p>
				  
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
				
					 foreach($answers as $k=>$v){
						  if($formtype=='multi Select')
							{
						     $popup .=   '<li><input type="checkbox" name="ck[$k]" value="'.$v->id.'">'.$v->answers.'</li>';
							}
							if($formtype=='single Select')
							{
							 $popup .=   '<li><input type="radio" name="rd" value="'.$v->id.'">'.$v->answers.'</li>';	
							}
							if($formtype=='Drop Down')
							{
							 $popup .=   '<option value="'.$v->id.'">'.$v->answers.'</option>';	
							}
				        }
				if($formtype=='Drop Down')
							{
							 $popup .=   '</select>';	
							}
								 
		if($queData->other_custom_field==1)
		{
			$popup .=   '<li class="other" ><span><input type="checkbox"></span> <input type="text" placeholder="Other">
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
			if($key < count($Qids)-1){
				$popup .= '<input type="submit" value="NEXT" class="btn btn-success submit nextQue" data-serviceId='.$serviceId.' data-qid='.$Qids[$i].' id="myBtn3">';
			}
			elseif($key <=count($Qids)){
				$popup .= '<input type="submit" value="Submit" class="btn btn-success submit " data-serviceId='.$serviceId. ' id="myBtn3">';
			}
			if($key > 0){
				$popup .= '<a href="javascript:void(0)"  title="Back" data-serviceId='.$serviceId.' data-qid='.$Qids[$j].'  class="back"> < Back</a>';}
				$popup .= '</div>
			<!--/Popup footer-->
				</div>
			   </div>      
			 </div>';
			 echo $popup;die;
	   }
   }
}
