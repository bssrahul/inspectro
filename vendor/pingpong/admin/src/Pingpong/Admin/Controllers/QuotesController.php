<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Quote;
use Pingpong\Admin\Entities\Question;
use Pingpong\Admin\Repositories\Quotes\QuoteRepository;
use Pingpong\Admin\Repositories\Questions\QuestionRepository;
use Pingpong\Admin\Validation\Quote\Create;
use Pingpong\Admin\Validation\Quote\Update;
use DB;
use Mail;
class QuotesController extends BaseController
{
    protected $repository;
	 protected $querepository;

public function __construct(QuoteRepository $repository,QuestionRepository $querepository)
{
	$this->repository = $repository;
	$this->querepository = $querepository;
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
			$que_id= @$quotes[0]['id'];
			$status= @$quotes[0]['status'];
			$queReqAnsData= DB :: table ("quote_requests_answers")->where('quote_requests_id',$que_id)->get();
			//echo "<pre>"; print_R($queReqAnsData);die;
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
								$tempQue[$i]['question_id']=@$questionData[0]->title;
								$tempQue[$i]['answer_id'][$k]=@$answerData[0]->answers;
								if(!empty($v->custom_answer)){
									$tempQue[$i]['custom_answer'][$k]=$v->custom_answer;
								}
							}else{
								$AnsID=$v->answer_id;
								$answerData=DB :: table('answers')->where('id',$AnsID)->get();
								//echo "<pre>"; print_r($answerData[0]->answers);
								$tempQue[$i]['question_id']=@$questionData[0]->title;
								$tempQue[$i]['answer_id'][$k]=@$answerData[0]->answers;
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
			 $reqId=$request->get('requestId');
					
		}
		$requestData= DB::table('quote_requests')->where('id',$reqId)->get();
		$service_id=$requestData[0]->service_id;
		
		
		$adminQuestion=$this->querepository->getQueAnswers($service_id);
		
		
		
		
		return $this->view('quotes.create', compact('requestData','reqId','adminQuestion','service_id'));
		
	

}

/**
* Store a newly created category in storage.
*
* @return Response
*/
public function store(Create $request)
{
		$Alldata = $request->all();
		//echo "<pre>"; print_R($Alldata);die;
		$id=$Alldata['id'];
		//$service_id=$Alldata['serviceid'];
		$contactName=$Alldata['full_name'];
		$contactEmail=$Alldata['email'];
		
		//echo "<pre>"; print_r($finalQueAnsArr);die;
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
			//echo "success";
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
		try {
		
			$quotes = $this->repository->findById($id);
			return $this->view('quotes.edit', compact('quotes'));
			//echo "<pre>"; print_r($quotes);die;	
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
	
	try {
		

		$data = $request->all();
		
		//echo "<pre>"; print_R($data);
		//print_r($id);die;
		$quote = $this->repository->findById($id);
		$quote->update($data);
		return $this->redirect('quotes.index');
		
		
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