<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Pingpong\Admin\Entities\Sqoption;
use Pingpong\Admin\Repositories\Sqoptions\SqoptionRepository;
use Pingpong\Admin\Validation\Sqoption\Create;
use Pingpong\Admin\Validation\Sqoption\Update;
use DB;
class SqoptionsController extends BaseController
{
    protected $repository;

    public function __construct(SqoptionRepository $repository)
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
        return $this->redirect('sqoptions.index');
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index(Request $request)
    {
			
        $categories = $this->repository->allOrSearch($request->get('q'));
		//echo "<pre>";print_r();
       $no = $categories->firstItem();
       // print_R($no);exit;
        return $this->view('sqoptions.index', compact('categories', 'no'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
		$op_type = DB::table('option_type')->lists('op_type','id');
		$question = DB::table('categories')->where('type','question')->lists('title','id');
		//print_r($category);die;
		$sel1[]='---Select Question---';
		$question=$sel1+$question;
		$sel[]='---Select option type---';
		$op_type=$sel+$op_type;
		return $this->view('Sqoptions.create',compact('op_type','question'));

    } 

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
   public function store(Create $request)
    {  
        $data = $request->all();
		$options=$data['options'];
		$optionck=$data['optioncks'];
		print_r($optionck);
		foreach($options as $k=>$v)
		{
			echo $k;
			if(empty($optionck[$k]))
			{
				$optionck[$k]=0;
			}
			
			if(isset($optionck[$k]))
			{
				$optionsarray[]=array('status'=>$optionck[$k],'option'=>$v);
				
			}
			
		}
		//print_r($optionck);die;
		//echo '<pre>';
		//print_r(json_encode($optionsarray,true));die;
		$data['options']=json_encode($optionsarray,true);
	    Sqoption::create($data);
        return $this->redirect('sqoptions.index');
    } 

    /**
     * Display the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $category = $this->repository->findById($id);
            return $this->view('Sqoptions.show', compact('category'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $category = $this->repository->findById($id);
            return $this->view('Sqoptions.edit', compact('category'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Update $request, $id)
    {
        try {
            $data = $request->all();

            $category = $this->repository->findById($id);

            $category->update($data);

            return $this->redirect('Sqoptions.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);

            return $this->redirect('Sqoptions.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
