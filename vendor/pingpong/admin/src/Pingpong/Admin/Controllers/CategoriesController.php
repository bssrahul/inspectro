<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Category;
use Pingpong\Admin\Repositories\Categories\CategoryRepository;
use Pingpong\Admin\Validation\Category\Create;
use Pingpong\Admin\Validation\Category\Update;
use DB;
class CategoriesController extends BaseController
{
    protected $repository;

public function __construct(CategoryRepository $repository)
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
return $this->redirect('categories.index');
}

/**
* Display a listing of categories
*
* @return Response
*/
public function index(Request $request)
{
   
	$pid=$request->get('p_id');
	$sid=$request->get('s_id');
	if(empty($pid) && (!empty($sid))){
		$pid=$sid;
	}
	$categories = $this->repository->allOrSearch($request->get('q'),$pid);
	
	
	$no = $categories->firstItem();
	// print_R($no);exit;
	
	if((!empty($pid)) && (empty($sid))){
			
			return $this->view('categories.index', compact('categories', 'no','pid'));
	}elseif(!empty($sid)){
		
		return $this->view('categories.index', compact('categories', 'no','sid'));
	}else{
		return $this->view('categories.index', compact('categories', 'no'));
	}
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function services($id)
{
            
		$services =DB::table('categories')->where(['parent_id' => $id])->paginate(10);
		return $this->view('categories.service', compact('services','id'));
}
	public function create(Request $request)
	{
			$id=$request->get('id');
			$type=$request->get('type');
			return $this->view('categories.create', compact('id','type'));

	}
	public function servicecreate($id=null)
	{
		//print_r($id);die;
			
			//echo "<pre>"; print_r($option);die;
			return $this->view('categories.servicecreate', compact('id'));


			return $this->view('categories.servicecreate');

	}
/**
* Store a newly created category in storage.
*
* @return Response
*/
public function store(Create $request)
{
		$data = $request->all();
		$type=$data['type'];
	    $parent_id=$data['parent_id'];

		Category::create($data);
		if($type=="service")
		 {
		  return $this->redirect('categories.index',['p_id'=>$parent_id]);
		 }elseif($type=="question"){
		  return $this->redirect('categories.index',['s_id'=>$parent_id]);
		 }else{
		  return $this->redirect('categories.index');
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
return $this->view('categories.show', compact('category'));
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
	$data = $request->all();
	
	   $type=$data['type'];
		try {
				$category = $this->repository->findById($id);
				return $this->view('categories.edit', compact('category','type'));
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
	$type=$data['type'];
	$parent_id=$data['parent_id'];

$category = $this->repository->findById($id);

$category->update($data);
if($type=="service")
 {
	
	return $this->redirect('categories.index',['p_id'=>$parent_id]);
 }elseif($type=="question"){
	
	return $this->redirect('categories.index',['s_id'=>$parent_id]);
	}else{
	return $this->redirect('categories.index');
 }


} catch (ModelNotFoundException $e) {
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
}