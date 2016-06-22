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
			
			$quesId=$request->get('ques_id');
					
			 // echo '<pre>';print_r($quesId);exit;
			$rq=$request->get('q');
			$categories = $this->repository->allOrSearch($rq,$quesId);
	//	$categories = \App\Models\Sqoption::with('option_type')->get();
		//  $categories = Sqoption::Sqoption(id)->with('option_type')->get();
		//echo "<pre>";print_r($categories);die;
       $no = $categories->firstItem();
       //echo '<pre>';print_r($categories);exit;
	  if(!empty($quesId)){
		   return $this->view('sqoptions.option', compact('categories', 'no','$quesId'));
	  }else{
		   return $this->view('sqoptions.index', compact('categories', 'no'));
	  }
	  
       
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
		$op_type = DB::table('option_type')->lists('op_type','id');
		$preQuestionData=DB::table('sqoptions')->get();
		$preArr=array();
		foreach($preQuestionData as $k=>$preQuestion){
			$preArr[]=$preQuestionData[$k]->service_question_id;
		}
		//echo "<pre>"; print_r($preArr);die;
		$questiondata = DB::table('categories')->where('type','question')->lists('title','id');
		$question=array();
		foreach($questiondata as $k=>$questionValue){
			if(in_array($k,$preArr)){
				echo "hello";
			}else{
				$question[$k]=$questionValue;
			}
		}
		//echo "<pre>"; print_r($finalquestionArr);die;
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
		//echo "<pre>";print_r($data);die;
		$options=$data['options'];
		if(!empty($data['optioncks'])){
			$optionck=$data['optioncks'];
			
		}
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
    public function edit($id,Request $request)
    {
			$optId=$request->get('opt');
			//	echo "<pre>";	print_r($opt);die("hello");

        try {
			$op_type = DB::table('option_type')->lists('op_type','id');
			$preQuestionData=DB::table('sqoptions')->get();
			$currentQuestionData=DB::table('sqoptions')->where('id',$id)->get();
			$currentQueId=$currentQuestionData[0]->service_question_id;
			//echo "<pre>"; print_r($currentQuestionData[0]->service_question_id);die;
			$preArr=array();
			foreach($preQuestionData as $k=>$preQuestion){
				$preArr[]=$preQuestionData[$k]->service_question_id;
			}
			//echo "<pre>"; print_r($preArr);die;
			$questiondata = DB::table('categories')->where('type','question')->lists('title','id');
			$question=array();
			foreach($questiondata as $k=>$questionValue){
				
				if((in_array($k,$preArr))&&($currentQueId != $k) ) {
				
				}else{
					$question[$k]=$questionValue;
				}
			}
			
			//echo "<pre>"; print_r($question);die;
			$sel1[]='---Select Question---';
			$question=$sel1+$question;
			$sel[]='---Select option type---';
			$op_type=$sel+$op_type;
			//echo "<pre>";print_r($id);die;
            $category = $this->repository->findById($id);
			$optionJSON=$category->options;
			$optionArr=json_decode($optionJSON);
			
			//echo "<pre>";print_r($optionArr);die;
            return $this->view('sqoptions.edit', compact('category','op_type','optionArr','question','optId'));
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
			//echo "<pre>";print_r($data);
			//echo "<hr>";
			$options=$data['options'];
		if(!empty($data['optioncks'])){
			$optionck=$data['optioncks'];
			
		}
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
            $category = $this->repository->findById($id);

            $category->update($data);
		//echo "<pre>";print_r($category);die;
		return $this->redirect('sqoptions.index');
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
				return $this->redirect('sqoptions.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
