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
			$queId=$request->get('que_id');		
			 // echo '<pre>';print_r($quesId);exit;
			$rq=$request->get('q');
			if(!empty($queId)){
						$sqData=DB :: table('sqoptions')->where('service_question_id',$queId)->get();
					
			}
			if((empty($sqData)) && (!empty($queId))){
					$QueData=DB :: table('categories')->where('id',$queId)->lists('title','id');
					$op_type = DB::table('option_type')->lists('op_type','id');
					$sel[0]='---Select option type---';
					$op_type=$sel+$op_type;
					$question=$QueData;
					return $this->view('sqoptions.create', compact('categories','question','op_type'));
					//echo "<pre>";print_r($QueData);die;
					
			}else{
					$categories = $this->repository->allOrSearch($rq,$quesId);
			}
			
			//echo "<pre>";print_r($categories);die;
			
			$catIdArr=array();
			foreach($categories as $category){
				$catIdArr[]=$category->service_question_id;
			}
		
			$QuestionData=DB :: table('categories')->where('type','question')->paginate(12);
			if(empty($quesId)){
					$categories=$QuestionData;

			}
			$serviceData=DB :: table('categories')->where('type','service')->paginate(12);	
				
			//echo "<pre>";print_r($QuestionData);die;
			//echo"<hr>";
			//echo "<pre>";print_r($QuestionData);die;
      // $no = $categories->firstItem();
      // echo '<pre>';print_r($categories);exit;
	  if((!empty($quesId)) && (empty($QueData))){
		   return $this->view('sqoptions.option', compact('categories','$quesId','catIdArr'));
	  }elseif(!empty($QueData)){
		  $Question=$QueData;
		   return $this->view('sqoptions.create', compact('categories','Question'));
	  }else{
		   return $this->view('sqoptions.index', compact('categories','catIdArr'));
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
				
			}else{
				$question[$k]=$questionValue;
			}
		}
		//echo "<pre>"; print_r($question);die;
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
		echo "<pre>";print_r($data);die;	   
		Sqoption::create($data);
		$qid=$data['service_question_id'];
		return $this->redirect('sqoptions.index',['ques_id'=>$qid]);
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
				//echo "<pre>";	print_r($optId);die("hello");

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
		//echo "<pre>";print_r($data['service_question_id']);die;
            $category->update($data);
			$qid=$data['service_question_id'];
		//echo "<pre>";print_r($category);die;
		return $this->redirect('sqoptions.index',['ques_id'=>$qid]);
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
