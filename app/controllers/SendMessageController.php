<?php

class SendMessageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function sendSMS($phoneNumber, $message, $senderId='BITSOKO'){
	
	$key="201b07f5876f6c01b75a" ;//your unique API key;
	$message=urlencode($message); //encode url;
												
	$url="http://bulk.mnotify.net/smsapi?key=$key&to=$phoneNumber&msg=$message&sender_id=$senderId";
	$result=file_get_contents($url); //call url and store result;

		switch($result){                                           
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
	
	public function sendEmail($toEmailAddress, $fromEmailAddress, $subject, $message){
	
	    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n".'From:'. $fromEmailAddress. "\r\n";

        $sub = $subject;

        $message = "<html>
				<head><title>BITSOKO LOGIN</title></head>
                    <body>
						<p>Dear EUGENE LOUIS BATIE BADZONGOLY,</p>
						<p>This email is to inform that you have successfully logged in to BITSOKO payment platform on". date('d/m/Y H:i:s')."</p>
						<p>If you initiated this login, then no action is required. However, in the unlikely event that you did not initiate this login, 
						please immediately send us an e-mail at enquiries@bitsoko.com.gh or call us 24/7 on +233 208530002 where someone is waiting to assist you.</p>
						</body>
				</html>";

        $message = wordwrap($message, 50);
        $feedback = mail($toEmailAddress, $subject, $message, $headers);

        if($feedback){

            return "Message Sent";

        }else{

            return "Message Not Sent";

        }
	
	
	}


}
