<?php namespace Pingpong\Admin\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Pingpong\Admin\Entities\Service;
use Pingpong\Admin\Repositories\Services\ServiceRepository;
use Pingpong\Admin\Validation\Service\Create;
use Pingpong\Admin\Validation\Service\Update;
use DB;
class ServicesController extends BaseController
{
    protected $repository;

    public function __construct(ServiceRepository $repository)
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
        return $this->redirect('services.index');
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index(Request $request)
    {
			
        $services = $this->repository->allOrSearch($request->get('q'));
		$QuestionData= DB :: Table('questions')->get();
		//echo "<pre>"; print_R($QuestionData);die;
		$QuestionArr=array();
		foreach($QuestionData as $Question){
			$QuestionArr[]=$Question->service_id;
		}
		//echo "<pre>"; print_R($QuestionArr);die;
		foreach($services as $k=>$service){
		
			if(in_array($service->id,$QuestionArr)){
				$services[$k]['avail']=1;
			}else{
				$services[$k]['avail']=0;
			}
		}
		//echo "<pre>"; print_R($services);die;
        $no = $services->firstItem();
   
        return $this->view('services.index', compact('services', 'no'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {

		return $this->view('services.create');

    } 

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
   public function store(Create $request)
    {  
        $data = $request->all();
	    Service::create($data);
        return $this->redirect('services.index');
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
            $services = $this->repository->findById($id);
            return $this->view('services.show', compact('services'));
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
            $services = $this->repository->findById($id);
            return $this->view('services.edit', compact('services'));
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

            $services = $this->repository->findById($id);

            $services->update($data);

            return $this->redirect('services.index');
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

            return $this->redirect('services.index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
