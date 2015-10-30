<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of PaymentOptionController
 *
 * @author skwakwa
 */
class PaymentOptionController  extends BaseController {
 public function __construct() {
        
        $this->rules = array('mobile_number' => 'required|min:10', 'mobile_provider' => 'required');
    }

//	private $regions;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $user =  Auth::user();
        $mobileWallet  = PaymentOption::whereRaw('user_id = ? ', array($user->id))->get();
        return View::make('user.payment', array('user' => Auth::user(),'wallets'=>$mobileWallet));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('user.paymentcreate', array("user" => Auth::user()));   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make(Input::all(), $this->rules);



        if ($validator->fails()) {
            return Redirect::to('/profile/payment')
                            ->with('flash_error', 'true')
                            ->withErrors($validator);
        } else {
            $mobileWallet = new PaymentOption;
            $mobileWallet->mobile_provider = Input::get('mobile_provider');
            $mobileWallet->user_id = Auth::user()->id;
            $mobileWallet->wallet_no = Input::get('mobile_number');
            $mobileWallet->confirmation_code = Input::get('confirmation_code');
            $mobileWallet->wallet_status = '3';//
            $mobileWallet->created_at = date('Y-m-d H:i:s');
            $mobileWallet->modified_by = 1;
            $mobileWallet->save();
            Session::flash('message', "{$mobileWallet->wallet_no} created successfully");
            return Redirect::to('/profile/payment');
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

    public function getSubDistricts() {
//
        $district = Input::get('district');

        if (!$district) {
            return false;
        }

        $options = "";
        $lists = SubDistrict::whereRaw('district_id = ? ', array($district))->get();


        foreach ($lists as $k => $v) {
            $id = $v->id;
            $data = $v->name;
            $options.= '<option value="' . $id . '">' . $data . '</option>';
        }

        return $options;
    }}
