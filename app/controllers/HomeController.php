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
	/**
	 * @return mixed
	 * retrieves all the aperos
	 */
	public function index()
	{
		$aperos=$this->aperos->all();
		return View::make('home',compact('aperos'));
	}


}
