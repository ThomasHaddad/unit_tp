<?php

class HomeController extends BaseController {
	protected $aperos;
	public function __construct(Apero $apero){
		$this->aperos=$apero;
	}
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$aperos=$this->aperos->all();
		return View::make('home',compact('aperos'));
	}
	public function showLogin()
	{
		// show the form
		return View::make('login');
	}

	public function doLogin()
	{
		$rules = array(
			'username'    => 'required',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username'     => Input::get('username'),
				'password'  => Input::get('password')
			);


			if (Auth::attempt($userdata)) {

				return Redirect::to('/');


			} else {

				return Redirect::to('login')->withFlashMessage('error');

			}

		}
	}
	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}
