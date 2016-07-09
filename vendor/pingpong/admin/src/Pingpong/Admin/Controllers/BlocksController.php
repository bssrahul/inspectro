<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Block;
use Pingpong\Admin\Repositories\Blocks\BlockRepository;
use Pingpong\Admin\Validation\Block\Create;
use Pingpong\Admin\Validation\Block\Update;
use DB;
use Input;

class BlocksController extends BaseController
{
    protected $repository;

public function __construct(BlockRepository $repository)
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
return $this->redirect('blocks.index');
}

/**
* Display a listing of questions
*
* @return Response
*/
public function index(Request $request)
{
	
	if($request->get('updateStatus')!='' && $request->get('block_id')!=''){
			$id = $request->get('block_id');
			
			$block = $this->repository->findById($id);
			$data['status'] = $request->get('updateStatus');
			
			//echo "<pre>"; print_R($data);die;		  
			$block->update($data);
			
		}
	
	$blocks = $this->repository->allOrSearch($request->get('q'));
	
	//echo "<pre>"; print_R($blocks);die;
	$no = $blocks->firstItem();
	
	return $this->view('blocks.index', compact('blocks', 'no'));
	
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		return $this->view('blocks.create');
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
		$destinationPath =  public_path().'/uploads'; // upload path
		$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		$fname = Input::file('image')->getClientOriginalName();   
		$filename = rand(111,999).'.'.$fname; // renameing image
		
	//	echo "<pre>"; print_R($resizeImg);die;
		//$this->view('blocks.edit', compact('filename'));
		Input::file('image')->move($destinationPath, $filename); // uploading file to given path
		//echo "<pre>"; print_R($data);die;
		$data['image']=$filename;
		block::create($data);
		//echo "<pre>"; print_R($data);die;
		return $this->redirect('blocks.index');

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
				$blocks = $this->repository->findById($id);
				//echo "<pre>"; print_R($blocks);die;
				return $this->view('blocks.edit', compact('blocks'));
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
	//echo "<pre>"; print_R($data['bannar_image']);die;
		if(!empty($data['image'])){
			$destinationPath =  public_path().'/uploads'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$filename = Input::file('image')->getClientOriginalName();   
			$fname = Input::file('image')->getClientOriginalName();   
			$filename = rand(111,999).'.'.$fname; // renameing image
			Input::file('image')->move($destinationPath, $filename); // uploading file to given path
			$data['image']=$filename;
			$block = $this->repository->findById($id);
			$preImgage=$block->image;
			if(!empty($preImgage)){
				unlink($destinationPath.'/'. $preImgage);
			}
	
		}
		else{
				$block = $this->repository->findById($id);
				unset($block['image']);
				//echo "<pre>"; print_R($block);die;
		}
		$block->update($data);
		return $this->redirect('blocks.index');
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