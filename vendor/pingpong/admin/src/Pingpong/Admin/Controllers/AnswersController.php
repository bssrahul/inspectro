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
   
	$pid=$request->get('p_id');
	$sid=$request->get('s_id');
	$sertype=$request->get('type');
	//print_r($sertype);die;
	if(empty($pid) && (!empty($sid))){
		$pid=$sid;
		
	}
	
	if($sertype == 'service'){
		//echo "ddssd";die;
		 //print_r($sertype); die;
		 $pid=$sertype;
		
	}
	$questions = $this->repository->allOrSearch($request->get('q'),$pid);
	
	$catCount=count($questions);
	
	
	$no = $questions->firstItem();
	// print_R($no);exit;
	
	if((!empty($pid)) && (empty($sid))){
			
			return $this->view('questions.index', compact('questions', 'no','pid','sertype','catCount'));
	}elseif(!empty($sid)){
		
		return $this->view('questions.index', compact('questions', 'no','sid','sertype','catCount'));
	}else{
		return $this->view('questions.index', compact('questions', 'no','sertype','catCount'));
	}
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		$id=$request->get('id');
		$type=$request->get('type');
		$serviceArr=DB :: table("services")->lists('title','id');
		$formTypeArr=DB :: table("option_type")->lists('op_type','id');
		$sel[]='-- Select Service --';
		$sel1[]='-- Select Form Type --';
		$serviceArr=$sel + $serviceArr;
		$formTypeArr=$sel1 + $formTypeArr;
		//echo "<pre>"; print_R($question);die;
		return $this->view('questions.create', compact('id','type','serviceArr','formTypeArr'));

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
		Question::create($data);
		//echo "<pre>"; print_R($data);die;
		return $this->redirect('questions.index');

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
		
	 
		
		$serviceArr=DB :: table("services")->lists('title','id');
		$formTypeArr=DB :: table("option_type")->lists('op_type','id');
		$sel[]='-- Select Service --';
		$sel1[]='-- Select Form Type --';
		$serviceArr=$sel + $serviceArr;
		$formTypeArr=$sel1 + $formTypeArr;
		
		try {
				$question = $this->repository->findById($id);
				//echo "<pre>"; print_R($question);die;
				return $this->view('questions.edit', compact('question','type','serviceArr','formTypeArr'));
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
		
		$question = $this->repository->findById($id);
		$question->update($data);
		return $this->redirect('questions.index');
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