<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author skwakwa
 */
class UserController extends BaseController {

    public function __construct() {
        $this->rules = array('email' => 'required|min:3|email|unique:user_account',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'phone' => 'required|min:10',
            'role' => 'required|min:2',
        );
    }

    public function show($id) {
        $device = Device::find($id);
        return View::make('devices.show', array('device' => $device, 'status' => $this->status, 'types' => $this->types, 'users' => $this->users));
    }

    public function create() {
        return View::make('devices.create', array('status' => $this->status, 'types' => $this->types, 'users' => $this->users, 'region' => $this->region));
    }
    
    
    	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email' => 'required|alphaNum|min:3|email', 
			'password' => 'required|alphaNum|min:3' 
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
        
		if($validator->fails()) {
		   return Redirect::to('login')
				->with('flash_error','true')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
		   $userdata = array(
			'email' => Input::get('username'),	
			'password' => Input::get('password')
		   );		

		   if (Auth::attempt($userdata)) {
			    return Redirect::to('/dashboard');	
		   } else {
			return Redirect::to('login')
				->with('flash_error','true')
				->withInput(Input::except('password'));
		   }
		}
	}


    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('/register')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = new User;
            $user->firstname = Input::get("firstname");
            $user->lastname = Input::get("lastname");
            $user->phone = Input::get("phone");
            $user->email = Input::get("email");
            $user->role = "public";
            $user->status = "02";
            $user->password = Hash::make(Input::get("password"));
            $user->save();

            //Send Msg

            Session::flash('message', "Account Created Please Login to confirm email ");
            return Redirect::to('/login');
        }
        //$user = new User;
    }

    public function edit($id) {
        $device = Device::find($id);
        return View::make('devices.edit', array('device' => $device, 'status' => $this->status, 'types' => $this->types, 'users' => $this->users, 'region' => $this->region));
    }

    public function update($id) {
        
    }

    public function resetPassword() {

        $this->rules = array('email' => 'required|min:3|email');
        if ($validator->fails()) {
            return Redirect::to('/register')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = User::whereRaw("email = ? ", array(Input::get("email")))->first();
            if (null == $user) {
                return Redirect::to('/reset')
                                ->with('flash_error', 'true')
                                ->withErrors("Email Does not Exist");
            } else {
      
                Session::flash('message', "Email Valid Enter New Password");
                return Redirect::to('/set-password');
      
            }
        }
    }

    public function checkPasswordReset() {
        $this->rules = array('e' => 'required|min:3|email', 
            't' => 'required|min:7', 
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password');
        if ($validator->fails()) {
            return Redirect::to('/confirm-account')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = User::whereRaw("email = ? ", array(Input::get("email")))->first();
            if (null == $user) {
                return Redirect::to('/confirm-account')
                                ->with('flash_error', 'true')
                                ->withErrors("Email Does not Exist");
            } else {
                //Send Link for generation
                $user->password(Hash::make(Input::get("password")));
                $user->save();

                Session::flash('message', "Password Set Please Login");
                return Redirect::to('/login');
            }
        }
    }

    public  static function generateToken($key) {

        $token = new Token;
        $token->token_key = $key;
        $token->token_value = Hash::make(date('YmdHis') . "HashKey");
        $token->expiry_date = \Carbon\Carbon::now()->addDay(1);
        $token->created_at = \Carbon\Carbon::now();
        $token->save();

        return $token->token_value;
    }
    
    public  static function generatePhoneToken($key,$length) {

        $token = new Token;
        $token->token_key = $key;
        $token->token_value = rand(pow(10, ($length-1)), pow(10, ($length))-1);
        $token->expiry_date = \Carbon\Carbon::now()->addDay(1);
        $token->created_at = \Carbon\Carbon::now();
        $token->save();

        return $token->token_value;
    }
    
    
    
    public function  showProfile(){
        
        return View::make('user.profile', array('user' => Auth::user()));
    }

}
