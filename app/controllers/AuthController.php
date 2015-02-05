<?php
/**
 * Created by PhpStorm.
 * User: thomashaddad
 * Date: 05/02/15
 * Time: 21:09
 */

class AuthController extends BaseController{

    /**
     * @return mixed
     */
    public function showLogin()
    {
        // show the form
        return View::make('login');
    }

    /**
     * @return mixed
     * Login validation
     */
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

    /**
     * @return mixed
     * Logout
     */
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}