<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Quote;
use Pingpong\Admin\Repositories\Quotes\QuoteRepository;
use Pingpong\Admin\Validation\Quote\Create;
use Pingpong\Admin\Validation\Quote\Update;
use DB;
use Mail;
class QuotesController extends BaseController
{
    protected $repository;

public function __construct(QuoteRepository $repository)
{
$this->repository = $repository;
}
/**
* Redirect not found.
*
* @return Response
*/
protected function redirectNotFound()
{
return $this->redirect('quotes.index');
}

/**
* Display a listing of questions
*
* @return Response
*/
public function index(Request $request)
{
		$request_id=$request->get('reqid');
		if(!empty($request_id)){
			$quotes = $this->repository->allOrSearch($request->get('q'),$request_id);
			//echo "<pre>"; print_R($quotes);die;
			$SelOptionArr=array();
			foreach($quotes as $quote){
				$SelOptionArr=$quote->selected_options;
			}
			$selOpArr=json_decode($SelOptionArr);
		
			foreach($selOpArr as $k=>$selOp){
					$qid= $selOp->qid;	
					$questionData=DB :: table('questions')->where('id',$qid)->get();
					//echo "<pre>"; print_r($questionData[0]->title);
					$selOp->quesName=$questionData[0]->title;
					$obj=(array)$selOp;
					$ttl= count($obj); 
					for($i=1;$i< $ttl-1 ; $i++){ 
						$optionid=$obj['op'.$i];
						if (is_numeric($optionid)) {
							$answersData=DB :: table('answers')->where('id',$optionid)->get();
							$obj['op'.$i]=@$answersData[0]->answers;
						}else{
							$obj['op'.$i]=@$optionid;
						}
						$selOpArr[$k]=$obj;	
					}	
					
			}
			//echo "<pre>"; print_r($selOpArr);
			//echo "<pre>"; print_r($SelOpArr);
			//die;
			
		}
		else{
			$quotes = $this->repository->allOrSearch($request->get('q'));
			
		}
		//echo "<pre>"; print_r($answers);die;
		$no = $quotes->firstItem();
		return $this->view('quotes.index', compact('quotes','no','request_id','selOpArr'));
	
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		// for no repeat a queston
			
		if(!empty($request->get('requestId'))){
			echo $reqId=$request->get('requestId');
					
		}
		$requestData= DB::table('quote_requests')->where('id',$reqId)->get();
		
	
		//echo "<pre>"; print_r($requestData);die;
		//echo "<pre>"; print_r($questiondata);
		//end of no repeat a question	
		
	
		//echo "<pre>"; print_r($qid);die;
		//echo "<pre>"; print_R($qid);die;
		
		return $this->view('quotes.create', compact('requestData','reqId'));
		
	

}

/**
* Store a newly created category in storage.
*
* @return Response
*/
public function store(Create $request)
{
		$data = $request->all();
	//	echo "<pre>"; print_R($data);die;
		$id=$data['id'];
		$contactName=$data['full_name'];
		$contactEmail=$data['email'];
		if(!empty($data['phone_no'])){
			$phone_no=$data['phone_no'];
		}
		$contactMessage=$data['message'];
		//echo "<pre>"; print_R($id);die;
		$data = array(
			'name'=>$contactName, 
			'email'=>$contactEmail, 
			'message'=>$contactMessage
		);
		Mail::send('vendor.pingpong.admin.quotes.reply', $data, function($message) use ($contactEmail, $contactName)
		{   
				$message->to($contactEmail, $contactName)->subject('Mail via aallouch.com');
				//$message->to('info@aallouch.com', 'myName')->subject('Mail via aallouch.com');
		});
		
		/* Mail::send( $text, function ($message) {
		$message->from('us@example.com', 'Laravel');
		$message->to('rohitbss@mailinator.com');
		}); */
		/* if(	(!empty($id))&& (!empty($email))){
					
			$quoteData = $this->repository->findById($id);
			$data1['status'] = 1;
			//echo "<pre>"; print_R($data1);die;
			$quoteData->update($data1);	
		} */
		
		
		return $this->redirect('quotes.index');
			
}

/**
* Display the specified category.
*
* @param int $id
* @return Response
*/
public function show($id)
{
		try {
				$category = $this->repository->findById($id);
				return $this->view('questions.show', compact('category'));
			} catch (ModelNotFoundException $e) {
				return $this->redirectNotFound();
				}
}

/**
* Show the form for editing the specified category.
*
* @param int $id
* @return Response
*/
public function edit($id,REQUEST $request)
{
		
		$qid=$request->get('ques_id');
		$optId=$request->get('opt');
		$serviceid=$request->get('serv_id');
		$question=$request->get('ques_id');
		$hd=$request->get('hd');
		
		
			$selectedQuestionName=DB :: table("questions")->where('id',$qid)->lists('title','id');
			$selectedServiceName=DB :: table("services")->where('id',$serviceid)->lists('title','id');
			$nextQuestionData=DB :: table("questions")->where('service_id',$serviceid)->lists('title','id');

			$nextQuestionArr=array();
			foreach($nextQuestionData as $k=>$nextQuestions){
				
				if($k != $question){
					echo $nextQuestionArr[$k]=$nextQuestions;
				}
			
			}
			$nextQuestionArr[0]=' End Questionaire ';
			$nextQuestionArr[null]='---Select Next Question---';
			ksort($nextQuestionArr);
			
			
		//	echo "<pre>"; print_R($question);
			//echo "<pre>"; print_R($selectedServiceName);
		//	echo "<pre>"; print_R($nextQuestionData);
		//	echo "<pre>"; print_R($nextQuestionArr);die;
		
		
		
		$questionArr=DB :: table("questions")->lists('title','id');
		$sel[]='-- Select Question --';
		$questionArr=$sel + $questionArr;
		//$nextQuestionArr=$questionArr;
		
		//echo "<pre>"; print_R($serviceid);die;
		//echo "<pre>"; print_R($questiondata);die;
		try {
				$answer = $this->repository->findById($id);
				$answer_id=$answer['id'];
				$answerName=$answer['answers'];
				
				//echo "<pre>"; print_R($answer);die;
				return $this->view('quotes.edit', compact('answer','answer_id','answerName','questionArr','nextQuestionArr','qid','optId','hd','serviceid','selectedQuestionName','selectedServiceName'));
		}catch (	
				ModelNotFoundException $e) {
				return $this->redirectNotFound();
		}
}

/**
* Update the specified category in storage.
*
* @param int $id
* @return Response
*/
public function update(Update $request, $id)
{
	//print_r($id);die;
	try {
		

		$data = $request->all();
		
		if(!empty($data['qid'])){
			$ques_id=$data['qid'];
			$service_id=$data['service_id'];
		}
		//echo "<pre>"; print_R($data);die;
		foreach($data['answers'] as $k=>$value){
			$tempArr = array();
			$tempArr['answers'] = $value;
			if(!empty($data['question_id'])){
				$tempArr['question_id'] = $data['question_id'];
			}
			
			if(!empty($data['custom_answer'][$k])  ){
				$tempArr['custom_answer'] = $data['custom_answer'][$k];
			}else{
				$tempArr['custom_answer'] = 0;
			}
			$tempArr['next_question_id'] = $data['next_question_id'][$k];
			$tempArr['option_description'] = $data['option_description'][$k];
			$tempArr['sort'] = $data['sort'][$k];
			
			//Answer::create($tempArr);
		}
		$data=$tempArr;
		//echo "<pre>"; print_R($tempArr);
		$answer = $this->repository->findById($id);
		//echo "<pre>"; print_R($answer);die;
		$answer->update($data);
		if(!empty($ques_id)){
			return $this->redirect('quotes.index',['ques_id'=>$ques_id,'serv_id'=>$service_id]);
		}else{
			return $this->redirect('quotes.index');
		}
		
	 }
	 catch (ModelNotFoundException $e) {
	return $this->redirectNotFound();
	}
}

/**
* Remove the specified category from storage.
*
* @param int $id
* @return Response
*/
public function destroy($id)
{
	try {
	$this->repository->delete($id);
	return back();


	} catch (ModelNotFoundException $e) {
	return $this->redirectNotFound();
	}
}

public function getTotalService()
{
	$serviceCount=DB::table("questions")->where('type','service')->get();
	//echo"<pre>"; print_r($serviceCount);die;
	
}
}