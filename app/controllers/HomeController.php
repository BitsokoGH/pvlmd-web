<?php

use Bllim\Datatables\Datatables;

class HomeController extends BaseController {
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

    public function showWelcome() {
        return View::make('hello');
    }

    public function showHome() {

if(Auth::user()->role=='admin')
            return Redirect::to('dashboard');
          $dashboard = new Dashboard();
        $bills = $dashboard->getBills();
        $payments = $dashboard->getUserBillPayment();
        
        $propertiees = $dashboard->getUserProperties(); $lc= $dashboard->getAmountDue();
      return View::make('dashboard', array('user' => Auth::user(),'properties'=>$propertiees,'bills'=>$bills,'payments'=>$payments,'lc'=>$lc));


        //return View::make('dashboard', array('user' => Auth::user()));
    }

    public function showLogin() {
        return View::make('login');
    }

    public function showRegister() {
        return View::make('register');
    }

    public function getData() {

        $subs = User::select(array('id', 'firstname', 'lastname', 'phone', 'role', 'status', 'created_at'));

        return Datatables::of($subs)->make();
    }

    public function doLogin() {

        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                            ->with('flash_error', 'true')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'status' => '01'
            );

            if (Auth::attempt($userdata)) {
                $user = Auth::user();
               // SendMessageController::sendSMS($user->phone, "Just Login " . $user->firstname . " " . $user->lastname, $user->id);
               if($user->role=='admin') 
return Redirect::to('dashboard');
else
return Redirect::to('/');
            } else {
                return Redirect::to('login')
                                ->with('error_message', 'Wrong Username or Password');
            }
        }
    }

    public function showForgotPassword() {

        return View::make('guest/forget');
    }

    public function doForgotPassword() {
        $this->rules = array('username' => 'required|email',
        );
        $isEmail = false;
        $validator = Validator::make(Input::all(), $this->rules);
        $valid = false;
        if ($validator->fails()) {
            $this->rules = array('username' => 'required|min:10');
            $validator = Validator::make(Input::all(), $this->rules);
            if ($validator->fails()) {
                
            }
        } else {
            $isEmail = true;
            $valid = true;
        }
        if (!$valid) {
            return Redirect::to('/forgot-password')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            if ($isEmail)
                $user = User::whereRaw("email=?", array(Input::get("username")))->first();
            else
                $user = User::whereRaw("phone=?", array(Input::get("username")))->first();
            if (null == $user) {
                Session::flash('error_message', "Email/Phone Number Not In system");
                return Redirect::to('/login');
            } else {
                Session::flash('message', "An Email has been sent please check to reset your password");
                $tkn = sha1(UserController::generateToken("reset-" . $user->id));

               
                $data = array('name' => $user->firstname, 'token' => ($tkn), 'email' => $user->email,'firstname'=>$user->firstname);

                Mail::send('emails.mail.reset-password', $data, function($message) use($data) {
                    $message->to($data["email"], $data["firstname"])->subject('Password Reset to Public And Vested Land Management Division!');
                });

                return View::make('guest.blank', array('title' => "Email Sent", "content" => " ", "error" => ""));
            }

            //Send Msg
        }
    }

    public function doConfirmAccount() {
        $this->rules = array('u' => 'required',
            "t" => "required", "ptoken" => "required|numeric|min:1000|max:9999"
        );

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Redirect::to('/forgot-password')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
            return View::make('guest.blank', array('title' => "Invalid Token For User", "content" => "You token Is either Expired or Invalid", "error" => "Invalid Token"));
        } else {
            $user = User::find(Input::get('u'));

            if (null == $user) {
                return View::make('guest.blank', array('title' => "Invalid User", "content" => "User not valid crossckeck from Email", "error" => "Invalid User"));
            } else {
                $token = Token::find(Input::get('t'));
                if (null != $token) {
                    $tkns = Token::whereRaw("token_key=? and expiry_date >=now() and status=0 ", array("phone-reg-" . Input::get('u')))->get();
                    foreach ($tkns as $tk) {
                        if ($tk->token_value == Input::get('ptoken')) {
                            $user->status = "01";
                            $user->save();
                            $tk->status = '1';
                            $tk->save();
                            $token->status = '1';
                            $token->save();
                            Session::flash('message', "Account Successfully Verified Please login ");
                            self::sms($user->phone, 'Your PVLMD Registration has been  Succcessfull. '.$user->getName().' Kindly login ', $user->id,"confirm-account");

                            return Redirect::to('/login');
                        } else {
                            Session::flash('error_message', "Token not valid");
                            return View::make('confirm-registration', array("user" => $user, "token" => $value));
                        }
                    }
                } else {
                    return View::make('guest.blank', array('title' => "Invalid Email Token", "content" => "Email Token Invalid", "error" => "Invalid Email"));
                }
            }

            //Send Msg
        }
    }

    public function showSetPassword() {
        $this->rules = array('e' => 'required|min:3|email',
            't' => 'required|min:20',
        );
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('/confirm-registration')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = User::whereRaw("email = ?", array(Input::get("e")))->first();

            if (null != $user) {

                $tokens = Token::whereRaw('token_key=? and expiry_date >=now() and status=0', array("reset-" . $user->id))->get();
                foreach ($tokens as $value) {

                    if (sha1($value->token_value) == Input::get("t")) {

                        return View::make('guest.set-password', array("user" => $user, "token" => $value));
                    }
                }

                return View::make('guest.blank', array('title' => "Invalid Token For User", "content" => "You token Is either Expired or Invalid", "error" => "Invalid Token"));
            } else {
                return View::make('guest.blank', array('title' => "Invalid Token", "content" => "You token Is either Expired or Invalid", "error" => "Invalid Token"));
            }
        }
    }

    public function doSetPassword() {
        $this->rules = array(
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
            'u' => 'required',
            't' => 'required');
        $validator = Validator::make(Input::all(), $this->rules);

        $user = User::find(Input::get('u'));
        $token = Token::find(Input::get('t'));
        if ($validator->fails()) {
            echo "Errors";
            return View::make('guest.set-password', array("user" => $user, "token" => $token))
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user->password = Hash::make(Input::get("password"));
            $user->save();
            Session::flash('message', "Password Successfully set Please Login");
            return Redirect::to('/login');
        }
    }

    public function showBlank() {

        return View::make('guest/blank');
    }

    public function doLogout() {
        Auth::logout();
        return Redirect::to('login');
    }

    public function showConfirmRegistration() {
        $this->rules = array('e' => 'required|min:3|email',
            't' => 'required|min:20',
        );
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('/confirm-registration')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = User::whereRaw("email = ?", array(Input::get("e")))->first();

            if (null != $user) {

                $tokens = Token::whereRaw('token_key=? and expiry_date >=now()  and status=0', array("reg-" . $user->id))->get();
                foreach ($tokens as $value) {

                    if (md5($value->token_value) == Input::get("t")) {
                        if ($user->status != "03") {
                            $user->status = "03";
                            $user->save();
                            $val = UserController::generatePhoneToken("phone-reg-" . $user->id, 4);
                            self::sms($user->phone, 'Welcome to PVLMD your token is ' . $val, $user->id);
                        }
                        return View::make('confirm-registration', array("user" => $user, "token" => $value));
                    }
                }

                return View::make('guest.blank', array('title' => "Invalid Token For User", "content" => "You token Is either Expired or Invalid", "error" => "Invalid Token"));
            } else {
                return View::make('guest.blank', array('title' => "Invalid Token", "content" => "You token Is either Expired or Invalid", "error" => "Invalid Token"));
            }
        }
    }

    public function doRegister() {
        $this->rules = array('email' => 'required|min:3|email|unique:user_account',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'phone' => 'required|min:10',
        );
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

            $vals = UserController::generateToken("reg-" . $user->id);
            $data = array('name' => $user->firstname, 'token' => md5($vals), 'email' => $user->email);

            Mail::send('emails.mail.register', $data, function($message) {
                $message->to(Input::get('email'), 'PVLMD')->subject('Welcome to Public And Vested Land Management Division!');
            });
            Session::flash('message', "Account Created Please Login to confirm email ");
            return Redirect::to('/login');
        }
    }

    function sms($phoneNumber, $message, $user = "",$module="login") {
        $key = "201b07f5876f6c01b75a"; //your unique API key;
        $message = urlencode($message); //encode url;
        $senderId = 'PVLMD';

        $url = "http://bulk.mnotify.net/smsapi?key=$key&to=$phoneNumber&msg=$message&sender_id=$senderId";
        $result = file_get_contents($url); //call url and store result;

        SendMessageController::saveMsg($senderId, $phoneNumber, "", $message, $user, $result, $module);
        switch ($result) {
            case "1000":
                return "Message sent";
                break;
            case "1002":
                return "Message not sent";
                break;
            case "1003":
                return "You don't have enough balance";
                break;
            case "1004":
                return "Invalid API Key";
                break;
            case "1005":
                return "Phone number not valid";
                break;
            case "1006":
                return "Invalid Sender ID";
                break;
            case "1008":
                return "Empty message";
                break;
        }
    }

}
