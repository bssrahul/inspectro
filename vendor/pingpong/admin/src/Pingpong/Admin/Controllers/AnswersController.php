<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Answer;
use Pingpong\Admin\Repositories\Answers\AnswerRepository;
use Pingpong\Admin\Validation\Answer\Create;
use Pingpong\Admin\Validation\Answer\Update;
use DB;
class AnswersController extends BaseController
{
    protected $repository;

public function __construct(AnswerRepository $repository)
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
return $this->redirect('answers.index');
}

/**
* Display a listing of questions
*
* @return Response
*/
public function index(Request $request)
{
	$qid=$request->get('ques_id');

		$answers = $this->repository->allOrSearch($request->get('q'),$qid);
	
	
	
		
	 
 
	
	//echo "<pre>"; print_r($answers);die;

	$no = $answers->firstItem();
	return $this->view('answers.index', compact('answers','no','qid'));
	
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		$qid=$request->get('que_id');
		$questionArr=DB :: table("questions")->lists('title','id');
		$sel[]='-- Select Question --';
		$questionArr=$sel + $questionArr;
		//echo "<pre>"; print_R($questionArr);die;
		return $this->view('answers.create', compact('id','type','questionArr','qid'));

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
		
		foreach($data['answers'] as $k=>$value){
			$tempArr = array();
			$tempArr['answers'] = $value;
			$tempArr['question_id'] = $data['question_id'];
			if(!empty($data['custom_answer'][$k])  ){
				$tempArr['custom_answer'] = $data['custom_answer'][$k];
			}else{
				$tempArr['custom_answer'] = 0;
			}
			$tempArr['next_question_id'] = $data['next_question_id'][$k];
			$tempArr['sort'] = $data['sort'][$k];
			
			Answer::create($tempArr);
		}
		//echo "<pre>"; print_R($tempArr);die;
		
		
		return $this->redirect('answers.index');

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
		
	 
		
		//echo "<pre>"; print_R($ques_id);die;
		$questionArr=DB :: table("questions")->lists('title','id');
		$sel[]='-- Select Question --';
		$questionArr=$sel + $questionArr;
		//echo "<pre>"; print_R($questionArr);die;
		try {
				$answer = $this->repository->findById($id);
				//echo "<pre>"; print_R($answer);die;
				return $this->view('answers.edit', compact('answer','type','questionArr'));
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
		//echo "<pre>"; print_R($data);die;
		foreach($data['answers'] as $k=>$value){
			$tempArr = array();
			$tempArr['answers'] = $value;
			$tempArr['question_id'] = $data['question_id'];
			if(!empty($data['custom_answer'][$k])  ){
				$tempArr['custom_answer'] = $data['custom_answer'][$k];
			}else{
				$tempArr['custom_answer'] = 0;
			}
			$tempArr['next_question_id'] = $data['next_question_id'][$k];
			$tempArr['sort'] = $data['sort'][$k];
			
			//Answer::create($tempArr);
		}
		$data=$tempArr;
		//echo "<pre>"; print_R($tempArr);
		$answer = $this->repository->findById($id);
		//echo "<pre>"; print_R($answer);die;
		$answer->update($data);
		return $this->redirect('answers.index');
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