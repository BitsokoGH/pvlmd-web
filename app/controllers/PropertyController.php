<?php

class PropertyController extends \BaseController {

    public function __construct() {
        $this->rules = array('recipient' => 'required|min:10', 'mobile_provider' => 'required');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $properties = Property::get();
        //dd($admins);
        //	return view('admin.index', compact('admins'));
        return View::make('property.index', array('properties' => $properties));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        $property = Property::find($id);
       
        return View::make('property.view', array('property' => $property)); 
    }
    
    
     public function showAssign($id) {
        //
        $property = Property::find($id);
       
        return View::make('property.assign', array('property' => $property)); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
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

    public static function saveMsg($sender, $recipient, $title, $msg, $user, $status, $purpose) {
        $message = new SMS();
        $message->recipient = $recipient;
        $message->sender = $sender;
        $message->message = $msg;
        $message->type = $purpose;
        $message->user_id = $user;
        $message->status = $status;
        $message->save();
    }

    public static function sendSMS($phoneNumber, $message, $user, $senderId = 'BITSOKO') {

        $key = "201b07f5876f6c01b75a"; //your unique API key;
        $message = urlencode($message); //encode url;

        $url = "http://bulk.mnotify.net/smsapi?key=$key&to=$phoneNumber&msg=$message&sender_id=$senderId";
        $status = "";

        $result = file_get_contents($url); //call url and store result;
//		switch($result){                                           
//			case "1000":
//			return "Message sent";
//			break;
//			case "1002":
//			return "Message not sent";
//			break;
//			case "1003":
//			return "You don't have enough balance";
//			break;
//			case "1004":
//			return "Invalid API Key";
//			break;
//			case "1005":
//			return "Phone number not valid";
//			break;
//			case "1006":
//			return "Invalid Sender ID";
//			break;
//			case "1008":
//			return "Empty message";
//			break;
//		}

        SendMessageController::saveMsg($senderId, $phoneNumber, "", $message, $user, $result, "login");
    }

    public function sendEmail($toEmailAddress, $fromEmailAddress, $subject, $message) {

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'From:' . $fromEmailAddress . "\r\n";

        $sub = $subject;

        $message = "<html>
		      <head><title>BITSOKO LOGIN</title></head>
                      <body>
						<p>Dear EUGENE LOUIS BATIE BADZONGOLY,</p>
						<p>This email is to inform that you have successfully logged in to BITSOKO payment platform on" . date('d/m/Y H:i:s') . "</p>
						<p>If you initiated this login, then no action is required. However, in the unlikely event that you did not initiate this login, 
						please immediately send us an e-mail at enquiries@bitsoko.com.gh or call us 24/7 on +233 208530002 where someone is waiting to assist you.</p>
		      </body>
	 	</html>";

        $message = wordwrap($message, 50);
        $feedback = mail($toEmailAddress, $subject, $message, $headers);

        if ($feedback) {

            return "Message Sent";
        } else {

            return "Message Not Sent";
        }
    }

    
    public function assign() {
        $rules = array('property' => 'required', 'user' => 'required');
        
        $validator = Validator::make(Input::all(), $rules);

        $property= Input::get('property');
        $user= Input::get('user');
        
        if ($validator->fails()) {
            return Redirect::to('propertyassign/'.$property)
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        }else{
             $proper = Property::find($property);
                DB::update('UPDATE  property_user SET status="INACTIVE", unassigned_date=now() WHERE property_id = ?  ', array($proper->property_id));
                
               
                $userProperty = new UserProperty();
                $userProperty->property_id=$proper->property_id;
                $userProperty->user_id=$user;
                $userProperty->created_at=date('Y-m-d H:i:s');
                $userProperty->created_by=Auth::user()->id;
                $userProperty->status='ACTIVE';
                $userProperty->save();
                
                return Redirect::to('propertyassign/'.$property);
                
        }
        
    }

}
