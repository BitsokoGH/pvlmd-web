<?php

class AdminController extends \BaseController {

    public function __construct() {
        $this->rules = array(
            'username' => 'required|min:3|email|unique:user_account',
            'email' => 'required|min:3|email|unique:user_account',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'phone' => 'required|min:10'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $admins = DB::table('user_account')->get();
        return View::make('admin.index', array('users' => $admins));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('admin/create')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $user = new User;
            $user->username = Input::get("username");
            $user->firstname = Input::get("firstname");
            $user->lastname = Input::get("lastname");
            $user->phone = Input::get("phone");
            $user->email = Input::get("email");
            $user->password = Hash::make(Input::get("password"));
            $user->role = "Admin";
            $user->status = "02";

            $user->save();

            $key = "201b07f5876f6c01b75a"; //your unique API key;
            $message = "Thanks for signing up to BITSOKO";
            $phoneNumber = Input::get("phone");
            $message = urlencode($message); //encode url;
            $senderId = 'BITSOKO';

            $url = "http://bulk.mnotify.net/smsapi?key=$key&to=$phoneNumber&msg=$message&sender_id=$senderId";
            $result = file_get_contents($url); //call url and store result;

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
            return Redirect::to('admin/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id);
        if (is_null($user)) {
            return Redirect::route('admin.index');
        }
        return View::make('admin.edit', array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();

        $user = User::find($id);
        $user->update($input);
        return Redirect::route('admin.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
