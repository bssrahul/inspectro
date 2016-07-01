<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Quote;
use Pingpong\Admin\Repositories\Quotes\QuoteRepository;
use Pingpong\Admin\Validation\Quote\Create;
use Pingpong\Admin\Validation\Quote\Update;
use DB;

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
			$SelOptionArr=array();
			foreach($quotes as $quote){
				$SelOptionArr=$quote->selected_options;
			}
			$selOpArr=json_decode($SelOptionArr);
			//echo "<pre>"; print_r($selOpArr);die;
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
		if(!empty($request->get('que_id'))){
			$qid=$request->get('que_id');
			$optId=$request->get('opt');
			$serviceid=$request->get('serv_id');
			$question=$request->get('que_id');
		
		}
		if(!empty($request->get('opt'))){
			
			$optId=$request->get('opt');
			$serviceid=$request->get('serv_id');
			$questionid=$request->get('question_id');
			
			
		}
		if(!empty($question)){
			$questionid=$question;
		}
			//echo "<pre>"; print_R($questionid);
			$selectedQuestionName=DB :: table("questions")->where('id',$questionid)->lists('title','id');
		
			$selectedServiceName=DB :: table("services")->where('id',$serviceid)->lists('title','id');
			$nextQuestionData=DB :: table("questions")->where('service_id',$serviceid)->lists('title','id');

			$nextQuestionArr=array();
			foreach($nextQuestionData as $k=>$nextQuestions){
				
				if($k != $questionid){
					echo $nextQuestionArr[$k]=$nextQuestions;
				}
			
			}
			
			
			$nextQuestionArr[0]=' End Questionaire ';
			$nextQuestionArr[null]='---Select Next Question---';
			ksort($nextQuestionArr);
			//echo "<pre>"; print_R($qid);die;
			//echo "<pre>"; print_R($selectedServiceName);
			//echo "<pre>"; print_R($nextQuestionArr);die;
			$preQuestionData=DB::table('answers')->get();
			
			$preArr=array();
			foreach($preQuestionData as $k=>$preQuestion){
				$preArr[]=$preQuestionData[$k]->question_id;
			}
		
			$questiondata = DB::table('questions')->lists('title','id');
			$questionArr=array();
		
			$diffarray=array();
			if(!empty($request->get('question_id'))){
				$question_id=$request->get('question_id');
				$qid=$question_id;
			}
		
			if(!empty($question_id)){
				$diffarray = array_diff($preArr, array($question_id));
				$preArr=$diffarray;
			}
			foreach($questiondata as $k=>$questionValue){
				if(in_array($k,$preArr)){
					
				}else{
					$questionArr[$k]=$questionValue;
				}
			}
			
		
			
		
		$sel1[]='---Select Question---';
	
		$questionArr=$sel1+$questionArr;
		
		//echo "<pre>"; print_r($questionArr);
		//echo "<pre>"; print_r($questiondata);die;
		//end of no repeat a question	
		
	
		//echo "<pre>"; print_r($qid);die;
		//echo "<pre>"; print_R($qid);die;
		if(!empty('qid')){
				return $this->view('quotes.create', compact('id','type','questionArr','questiondata','qid','optId','nextQuestionArr','selectedServiceName','selectedQuestionName','serviceid'));
		}else{
			$qid=$questionid;
			return $this->view('quotes.create', compact('id','type','questionArr','questiondata','qid','nextQuestionArr','selectedServiceName','serviceid'));
		}
	

}

/**
* Store a newly created category in storage.
*
* @return Response
*/
public function store(Create $request)
{
		$data = $request->all();
			//echo "<pre>"; print_R($data);die;
		if(!empty($data['qid'])){
				$qid=$data['qid'];
				$service_id=$data['service_id'];
		}
		//echo "<pre>"; print_R($service_id);die;
		foreach($data['answers'] as $k=>$value){
			$tempArr = array();
			$tempArr['answers'] = $value;
			
			if((!empty($data['question_id'])) ){
				$tempArr['question_id'] = $data['question_id'];
			}elseif(!empty($qid)){
				$tempArr['question_id'] = $qid;
			}
		
			if(!empty($data['custom_answer'][$k])  ){
				$tempArr['custom_answer'] = $data['custom_answer'][$k];
			}else{
				$tempArr['custom_answer'] = 0;
			}
			$tempArr['next_question_id'] = $data['next_question_id'][$k];
			$tempArr['option_description'] = $data['option_description'][$k];
			$tempArr['sort'] = $data['sort'][$k];
			
			Answer::create($tempArr);
		}
		//echo "<pre>"; print_R($tempArr);die;
		
		if(!empty($qid)){
			//echo "<pre>"; print_R($service_id);die;
			return $this->redirect('quotes.index',['ques_id'=>$qid,'serv_id'=>$service_id]);
		}else{
			return $this->redirect('quotes.index');
		}
		
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