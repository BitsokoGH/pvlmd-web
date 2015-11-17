<?php

class BillPaymentController extends BaseController {

    public function __construct() {

        $this->payoptions = array(array("type" => "lc", "name" => "Land Commission"),
            array("type" => "ecg", "name" => "Electricity Commisison of Ghana"), array("type" => "gwcl", "name" => "Ghana Water Company"));

           $this->rules = array('amount' => 'required', 'payment_option' => 'required', 'property' => 'required');
   
    }

//	private $regions;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $user = Auth::user();
  $dashboard = new Dashboard();
        $payments = $dashboard->getUserBillPayment();
        $mobileWallet = PaymentOption::whereRaw('user_id = ? ', array($user->id))->get();
//        $ar =array(array("type"=>"lc","name"=>"Lanc Commission"),
//                   array("type"=>"ecg","name"=>"Electricity Commisison of Ghana"),array("type"=>"gwcl","name"=>"Ghana Water Company"));
        $arTitles = array("Land Commission", "Electricity Commisison of Ghana", "Ghana Water ");

        return View::make('billpayment.payment', array('user' => Auth::user(), 'payitems' => $this->payoptions, "paytitle" => $arTitles,'payments'=>$payments));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('user.paymentcreate', array("user" => Auth::user()));   //
    }

    public function showProcess($id) {

        $user = Auth::user();
        $mobileWallet = PaymentOption::whereRaw('user_id = ? ', array($user->id))->get();
        $dashboard = new Dashboard();
        $properties = $dashboard->getUserProperties();
  $debt = $dashboard->getAmountOwedPerProperty();
$nm='';
foreach($this->payoptions as $k)
{
if($k["type"]==$id) $nm = $k["name"];
}
        return View::make('billpayment.processing', array("user" => Auth::user(), "type" => $id, "wallet" => $mobileWallet,'properties'=>$properties,'name'=>$nm,'owe'=>$debt));   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);



        if ($validator->fails()) {
            return Redirect::to('/billpayment/process/'.Input::get('bill_type'))
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $wallet = PaymentOption::find(Input::get('payment_option'));
            $pay = new BillPayment();
            $pay->property_id = Input::get('property');
            $pay->user_id = Auth::user()->id;
            $pay->bill_type = Input::get('bill_type');
            $pay->invoice_number = date('YmdHis').'-'.strtoupper(Input::get('bill_type')).'-'.time();
            $pay->paid_for=Auth::user()->firstname;  
            $pay->paid_by=Auth::user()->firstname;
            $pay->account_number=$wallet->wallet_no;
            $pay->payment_mode=$wallet->mobile_provider;
            $pay->amount_paid=Input::get('amount');
            $pay->recevied_by="System";
            $pay->date_paid=date('Y-m-d H:i:s');
            $pay->created_at=date('Y-m-d H:i:s');
            $pay->paid_year_month=date('Ym');
            $pay->save();
           
 $user = Auth::user();
 try {
              self::sms($user->phone, 'PVLMD Bill Payment, Type  ' . Input::get('bill_type') . ". Amount : GHS " . number_format(Input::get('amount')), $user->id);

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
          
           
            $data = array('payment_mode' => $pay->payment_mode, 'created_at' => $pay->created_at, "email" => $user->email, "name" => $user->firstname, "bill_type" => $pay->bill_type, "property_id" => $pay->property_id, "amount_paid" => $pay->amount_paid);
            Mail::send('emails.mail.transaction', $data, function($message) use($data) {
                $message->to($data["email"], $data["name"])->subject('PVLMD Bill Payment : ' . strtoupper($data["bill_type"]));
            });
            Session::flash('message', "Bill paid successfully");
            return Redirect::to('/billpayment');
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
        $district = SubDistrict::find($id);
        return View::make('subdistricts.edit', array("districts" => $this->regions));   //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
//
        $district = SubDistrict::find($id);
        return View::make('subdistricts.edit', array('subdistrict' => $district, "districts" => $this->regions));   //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
//
        $validator = Validator::make(Input::all(), $this->rules);



        if ($validator->fails()) {
            return Redirect::to('/subdistricts/' . $id . '/edit')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $district = SubDistrict::find($id);
            $district->name = Input::get('name');

            $district->district_id = Input::get('district');

            $district->save();
            Session::flash('message', "{$district->name} edited successfully");
            return Redirect::to('/subdistricts');
        }
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

 function sms($phoneNumber, $message, $user = "", $module = "billpayment") {
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
