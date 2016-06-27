<?php namespace App\Http\Controllers;
use Auth;
use App\User;
use DB;

class HomeController extends Controller {
	
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
		parent::__construct();
		
		
			
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$services = DB::table('services')->select('title','id')->take(3)->get();
		//print_r($services);die;
		return view('home.index',compact('services'));
	}
	
	public function serviceList()
	{
		//print_r($_REQUEST);
		echo url('/');
		//echo "hello";//print_r($request->get_all());
		die;
	}

}
