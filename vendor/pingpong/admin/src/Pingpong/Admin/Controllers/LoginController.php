<?php namespace Pingpong\Admin\Controllers;

session_check();

class LoginController extends BaseController
{

    /**
     * Show login page.
     *
     * @return mixed
     */
    public function index()
    {
        return $this->view('login');
    }

    /**
     * Login action.
     *
     * @return mixed
     */
    public function store()
    {
		
        $credentials = \Input::only('email', 'password');
        $remember = \Input::has('remember');
		
        if (\Auth::attempt($credentials, $remember)) {
            $_SESSION['admin'] = \Auth::id();
			
			
            return $this->redirect('home')->withFlashMessage('You have successfully logged in.');
        }

        if (getenv('PINGPONG_ADMIN_TESTING')) {
            return \Redirect::to('admin/login')->withFlashMessage("Authentication Failed! Please try again.")->withFlashType('danger');
        }

        return \Redirect::back()->withFlashMessage("Authentication Failed! Please try again.")->withFlashType('danger');
    }
}
