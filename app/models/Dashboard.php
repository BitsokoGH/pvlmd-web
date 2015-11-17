<?php

class Dashboard extends Eloquent {

    public function __construct() {
        $this->today = date("Y-m-d");
        $this->lastMonth = date("Ym", strtotime(DashboardController::addToDate('-1', 'Month', $this->today)));
        $this->lastMonthFull = date("M Y", strtotime(DashboardController::addToDate('-1', 'Month', $this->today)));
        $this->thisMonth = date("Ym");
        $this->thisMonthFull = date("M Y");
    }

    public function billPayment() {
        $payoptions = array(array("type" => "lc", "name" => "Rent"),
            array("type" => "ecg", "name" => "Electricity Commisison of Ghana"), array("type" => "gwcl", "name" => "Ghana Water Company"));
        ;
        $pay = array();

        foreach ($payoptions as $item) {

            $today = date("Y-m-d");
            $lastMonth = date("Ym", strtotime(DashboardController::addToDate('-1', 'Month', $today)));
            $lastMonthFull = date("M Y", strtotime(DashboardController::addToDate('-1', 'Month', $today)));
            $thisMonth = date("Ym");
            $thisMonthFull = date("M Y");
            $payment = array();
            $sumThisMonth = DB::table('bill_payment')
                    ->where('paid_year_month', $thisMonth)
                    ->where('bill_type', $item["type"])
                    ->sum('amount_paid');
            $sumLastThisMonth = DB::table('bill_payment')
                    ->where('paid_year_month', $lastMonth)
                    ->where('bill_type', $item["type"])
                    ->sum('amount_paid');
            $percnetage = "0";
            if ($sumThisMonth == $sumLastThisMonth) {
                $status = "No change";
                $percnetage = "0";
            } else if ($sumLastThisMonth == 0) {
                $status = " than last month";
                $percnetage = $sumThisMonth;
            } else {
                $percnetage = ceil(($sumThisMonth - $sumLastThisMonth) / $sumLastThisMonth * 100);

                $status = " from last month";
            }
            $payment = array("name" => $item["name"], "thismonth" => $sumThisMonth, "lastmonth" => $sumLastThisMonth, "monthstatus" => $status, "percent" => $percnetage);

            $pay[$item["type"]] = $payment;
        }

        return $pay;
    }

    public function paidAndUnPaid() {

        $paid = DB::table('bill')
                ->where('period', @date("Y"))
                ->where('bill_type', "lc")
                ->where('status', "paid")
                ->sum('amount');
        $notPaid = DB::table('bill')
                ->where('period', @date("Y"))
                ->where('bill_type', "lc")
                ->where('status', "not-paid")
                ->sum('amount');
        return array("paid" => $paid, "not-paid" => $notPaid);
    }

    public function getRecentPayment() {

        $payments = BillPayment::orderBy('date_paid', 'desc')->take(20)->get();
        return $payments;
    }

    public function getRecentPaymentByType($type) {

        $payments = BillPayment::where('bill_type', $type)->orderBy('date_paid', 'desc')->take(20)->get();
        return $payments;
    }

    public function getUserBillPayment() {
        $user = Auth::user();

        $payments = BillPayment::whereRaw(' user_id= ?', array($user->id))->orderBy('date_paid', 'desc')->take(40)->get();
        return $payments;
    }

    public function getUserProperties() {

        $user = Auth::user();
        $propertiees = UserProperty::whereRaw(' user_id= ? and status=?', array($user->id, 'ACTIVE'))->take(20)
                ->get();
        return $propertiees;
    }

    public function getBills() {
        $user = Auth::user();
        $q = "select b.* from bill b inner join property_user pu on b.property_id=pu.property_id where  pu.status=? and pu.user_id=? order by period desc limit 20" . $user->id;


        $rawResult = (array) DB::select($q, array("ACTIVE", Auth::user()->id));

        $bills = Bill::hydrate($rawResult);
        return $bills;
    }

public function getAmountOwedPerProperty(){
        $properties = self::getUserProperties(); $user = Auth::user();
        $prop = array();
        foreach ($properties as $property) {
                      $p=array('property'=>$property->property->area." - ".$property->property->location,"amt"=>self::amountOwedPerProperty($property->property_id));

 $prop[]=$p;       }

return $prop;
    }
    public function amountOwedPerProperty($property) {
        $billAmount = DB::table('bill')
                ->where('property_id', $property)
                ->where('bill_type', "lc")
                ->sum('amount');
        $amountPaid = DB::table('bill_payment')
                ->where('property_id', $property)
                ->where('bill_type', "lc")
                ->sum('amount_paid');

        return $billAmount - $amountPaid;
    }


 public function getAmountDue(){
        $properties = self::getUserProperties();
        $prop = array();
        $amt=0;
        foreach ($properties as $property) {
           $amt+=self::amountOwedPerProperty($property->property_id);
        }
        return $amt;
    }
}
