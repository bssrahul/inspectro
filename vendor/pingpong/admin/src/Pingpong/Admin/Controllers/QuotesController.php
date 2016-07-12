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
		$completeId=$request->get('com_req_Id');
		if(!empty($completeId)){
			$quoteData = $this->repository->findById($completeId);
			$data1['status'] = 2;
			//echo "<pre>"; print_R($data1);die;
			$quoteData->update($data1);	
		}
		if(!empty($request_id)){
			$quotes = $this->repository->allOrSearch($request->get('q'),$request_id);
			$que_id= $quotes[0]['id'];
			$status= $quotes[0]['status'];
			$queReqAnsData= DB :: table ("quote_requests_answers")->where('quote_requests_id',$que_id)->get();
			//echo "<pre>"; print_R($quotes);die;
			if(!empty($queReqAnsData)){
				$tempQue=array();
				$temp=array();
					
				foreach($queReqAnsData as $k=>$v){
					$temp[]=$v->question_id;
				}
				$uniTemp=array_unique($temp);
			}
			$newUniArr=array();
			foreach($uniTemp as $k => $v){
				$newUniArr[]=$v;
			}
			if(!empty($queReqAnsData)){
				$tempQue=array();
				$newTemp=array();
				for($i=0;$i	< count($newUniArr); $i++){
					
					foreach($queReqAnsData as $k=>$v){
					
						if(($v->question_id) == $newUniArr[$i]){
							//echo "id =".$v->question_id . "<br>";
							if(!in_array($v->question_id, $newTemp)){
								
								$tempQue[$i]['quote_requests_id']=$v->quote_requests_id;
								$newTemp[$i]=$v->question_id;
								$QueID=$v->question_id;
								$questionData=DB :: table('questions')->where('id',$QueID)->get();
								//echo "<pre>"; print_r($questionData[0]->title);
															
								$AnsID=$v->answer_id;
								$answerData=DB :: table('answers')->where('id',$AnsID)->get();
								//echo "<pre>"; print_r($answerData[0]->answers);
								$tempQue[$i]['question_id']=$questionData[0]->title;
								$tempQue[$i]['answer_id'][$k]=$answerData[0]->answers;
								if(!empty($v->custom_answer)){
									$tempQue[$i]['custom_answer'][$k]=$v->custom_answer;
								}
							}else{
								$AnsID=$v->answer_id;
								$answerData=DB :: table('answers')->where('id',$AnsID)->get();
								//echo "<pre>"; print_r($answerData[0]->answers);
								$tempQue[$i]['question_id']=$questionData[0]->title;
								$tempQue[$i]['answer_id'][$k]=$answerData[0]->answers;
								//$tempQue[$i]['answer_id'][$k]=$v->answer_id;
								$QueID=$v->question_id;
								$questionData=DB :: table('questions')->where('id',$QueID)->get();
								//echo "<pre>"; print_r($questionData[0]->title);
								if(!empty($v->custom_answer)){
									$tempQue[$i]['custom_answer'][$k]=$v->custom_answer;
								}
								
							}
							
						}
					
					
			
					
						}	
					}
					//$no = $tempQue->firstItem();
				}
			
				
			//echo "<pre>"; print_R($tempQue);  die;
			
			
	
		}
		else{
			$quotes = $this->repository->allOrSearch($request->get('q'));
				$no = $quotes->firstItem();
		}
		//echo "<pre>"; print_r($quotes);
		//echo "<pre>"; print_r($tempQue);die;
		
		return $this->view('quotes.index', compact('quotes','no','request_id','tempQue','status'));
	
	
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
		$Alldata = $request->all();
	//	echo "<pre>"; print_R($data);die;
		$id=$Alldata['id'];
		$contactName=$Alldata['full_name'];
		$contactEmail=$Alldata['email'];
		if(!empty($Alldata['phone_no'])){
			$phone_no=$Alldata['phone_no'];
		}
		$contactMessage=$Alldata['message'];
		//echo "<pre>"; print_R($contactMessage);die;
		$userData = array(
			'name'=>$contactName, 
			'email'=>$contactEmail
		);
		$data=$userData;
		$mailFlag=0;
		if(!empty($userData)){
			$subject = 'Inspectro - Reply of Quote Request';	
			$data['message'] = $contactMessage;
			Mail::send('emails.reply', compact('data'), function($message) use ($userData, $subject)
			{   
					$message->to($userData['email'],$userData['name'])->subject($subject);
					
			}); 
			$mailFlag=1;
			echo "success";
		}
		
		 if(($mailFlag == 1) && (!empty($userData)) ){
					
			$quoteData = $this->repository->findById($id);
			$data1['status'] = 1;
			//echo "<pre>"; print_R($data1);die;
			$quoteData->update($data1);	
		} 
		 
		
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