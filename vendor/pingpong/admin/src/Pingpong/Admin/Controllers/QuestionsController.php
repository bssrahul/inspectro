<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Question;
use Pingpong\Admin\Repositories\Questions\QuestionRepository;
use Pingpong\Admin\Validation\Question\Create;
use Pingpong\Admin\Validation\Question\Update;
use DB;
class QuestionsController extends BaseController
{
    protected $repository;

public function __construct(QuestionRepository $repository)
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
return $this->redirect('questions.index');
}

/**
* Display a listing of questions
*
* @return Response
*/
public function index(Request $request)
{
	$serviceid=$request->get('ser_id');
	$optId=$request->get('opt');
	//echo "<pre>"; print_R($serviceid);die;

	$questions = $this->repository->allOrSearch($request->get('q'),$serviceid);
	$answerData= DB :: Table('answers')->get();
	$answerArr=array();
	foreach($answerData as $answer){
		$answerArr[]=$answer->question_id;
	}
	
	foreach($questions as $k=>$question){
		
		if(in_array($question->id,$answerArr)){
			$questions[$k]['avail']=1;
		}else{
			$questions[$k]['avail']=0;
		}
	}
	//echo "<pre>"; print_R($questions);die;
	$no = $questions->firstItem();
	
	return $this->view('questions.index', compact('questions', 'no','serviceid','optId'));
	
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		if(!empty($request->get('serv_id'))){
			$servid=$request->get('serv_id');
			$optId=$request->get('opt');
			$service=DB :: table("services")->where('id',$servid)->lists('title','id');
		}
	
		//echo "<pre>"; print_R($service);
		//echo "<pre>"; print_R($optId);die;
		$id=$request->get('id');
		$type=$request->get('type');
		$serviceArr=DB :: table("services")->lists('title','id');
		$formTypeArr=DB :: table("option_type")->lists('op_type','id');
		$sel[]='-- Select Service --';
		$sel1[]='-- Select Form Type --';
		$serviceArr=$sel + $serviceArr;
		$formTypeArr=$sel1 + $formTypeArr;
		//echo "<pre>"; print_R($question);die;
		if(!empty($service)){
				$serviceArr=$service;
				return $this->view('questions.create', compact('id','type','serviceArr','formTypeArr','servid','optId'));
		}else{
			return $this->view('questions.create', compact('id','type','serviceArr','formTypeArr'));
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
		$sid=$data['service_id'];
		if(empty($data['other_custom_field'])){
			$data['other_custom_field']=0;
		}
		Question::create($data);
		//echo "<pre>"; print_R($data);die;
		return $this->redirect('questions.index',['ser_id'=>$sid]);

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
		
		$servid=$request->get('ser_id');
		$optId=$servid;
		
		$serviceArr=DB :: table("services")->lists('title','id');
		$formTypeArr=DB :: table("option_type")->lists('op_type','id');
		$sel[]='-- Select Service --';
		$sel1[]='-- Select Form Type --';
		$serviceArr=$sel + $serviceArr;
		$formTypeArr=$sel1 + $formTypeArr;
		
		try {
				$question = $this->repository->findById($id);
				//echo "<pre>"; print_R($question);die;
				return $this->view('questions.edit', compact('question','type','serviceArr','formTypeArr','servid','optId'));
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

		if(!empty($data['service_id'])){
			$serid=$data['service_id'];
		}
		if(empty($data['other_custom_field'])){
			$data['other_custom_field']=0;
		}
				//echo "<pre>"; print_R($data);die;
		$question = $this->repository->findById($id);
		$question->update($data);
		return $this->redirect('questions.index',['ser_id'=>$serid]);
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