<?php

use Bllim\Datatables\Datatables;

class DashboardController extends BaseController {

   
    public function __construct() {
         $this->payoptions =array(array("type"=>"lc","name"=>"Land Commission"),
                   array("type"=>"ecg","name"=>"Electricity Commisison of Ghana"),array("type"=>"gwcl","name"=>"Ghana Water Company"));
      ;
    }
    
    
    
    public function showAdmin() {

        $dashbord= new Dashboard();
        $payments= $dashbord->billPayment();
  
        
        return View::make('admin.dashboard',array('thismonth'=>$dashbord->thisMonthFull,'lastmonth'=>$dashbord->lastMonthFull,
            "recentpayment"=>$dashbord->getRecentPayment(),
            "billsummary"=>$payments,"paid"=>$dashbord->paidAndUnPaid()));
    }

    public static function addToDate($numToAdd, $period, $originalDate) {
        return date('Y-m-d', strtotime("$numToAdd $period", strtotime($originalDate)));
    }

     public function showAdminByType($type) {

        $dashbord= new Dashboard();
        $payments= $dashbord->billPayment();
  
        $pays= $payments[$type];
        
        return View::make('admin.dashboard_details',array('thismonth'=>$dashbord->thisMonthFull,'lastmonth'=>$dashbord->lastMonthFull,
            "recentpayment"=>$dashbord->getRecentPaymentByType($type),
            "billsummary"=>$pays,"paid"=>$dashbord->paidAndUnPaid()));
    }

   
}
