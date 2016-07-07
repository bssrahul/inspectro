<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Pingpong\Admin\Entities\Page;
use Pingpong\Admin\Repositories\Pages\PageRepository;
use Pingpong\Admin\Validation\Page\Create;
use Pingpong\Admin\Validation\Page\Update;
use DB;
use Input;

class PagesController extends BaseController
{
    protected $repository;

public function __construct(PageRepository $repository)
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
return $this->redirect('pages.index');
}

/**
* Display a listing of questions
*
* @return Response
*/
public function index(Request $request)
{
	
	if($request->get('updateStatus')!='' && $request->get('page_id')!=''){
			$id = $request->get('page_id');
			
			$page = $this->repository->findById($id);
			$data['status'] = $request->get('updateStatus');
			
			//echo "<pre>"; print_R($data);die;		  
			$page->update($data);
			
		}
	
	$pages = $this->repository->allOrSearch($request->get('q'));
	
	//echo "<pre>"; print_R($pages);die;
	$no = $pages->firstItem();
	
	return $this->view('pages.index', compact('pages', 'no'));
	
	
}

/**
* Show the form for creating a new category
*
* @return Response
*/

public function create(Request $request)
{
		return $this->view('pages.create');
}

/**
* Store a newly created category in storage.
*
* @return Response
*/
public function store(Create $request)
{
		$data = $request->all();
		$destinationPath =  public_path().'/uploads'; // upload path
		$extension = Input::file('bannar_image')->getClientOriginalExtension(); // getting image extension
		$fname = Input::file('bannar_image')->getClientOriginalName();   
		$filename = rand(111,999).'.'.$fname; // renameing image
	//	echo "<pre>"; print_R($resizeImg);die;
		$this->view('pages.edit', compact('filename'));
		Input::file('bannar_image')->move($destinationPath, $filename); // uploading file to given path
		//echo "<pre>"; print_R($data);die;
		$data['bannar_image']=$filename;
		Page::create($data);
		//echo "<pre>"; print_R($data);die;
		return $this->redirect('pages.index');

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
				$pages = $this->repository->findById($id);
				//echo "<pre>"; print_R($pages);die;
				return $this->view('pages.edit', compact('pages'));
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
		if(!empty($data['bannar_image'])){
			$destinationPath =  public_path().'/uploads'; // upload path
			$extension = Input::file('bannar_image')->getClientOriginalExtension(); // getting image extension
			$fname = Input::file('bannar_image')->getClientOriginalName();   
			$filename = rand(1111,9999).'.'.$fname; // renameing image
			$this->view('pages.edit', compact('filename'));
			Input::file('bannar_image')->move($destinationPath, $filename); // uploading file to given path
			$data['bannar_image']=$filename;
			$page = $this->repository->findById($id);
			$preImgage=$page->bannar_image;
			if(!empty($preImgage)){
				unlink($destinationPath.'/'. $preImgage);
			}
	
		}
		else{
				$page = $this->repository->findById($id);
				unset($page['bannar_image']);
				//echo "<pre>"; print_R($page);die;
		}
		$page->update($data);
		return $this->redirect('pages.index');
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