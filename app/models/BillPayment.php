<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BillPayment
 *
 * @author skwakwa
 */
class BillPayment extends Eloquent {

      //put your code here
    protected $table = 'bill_payment';

    public function billDetails() {
        return $this->hasOne('Bill', 'id', 'bill_id');
    }

    public function user() {
        return $this->hasOne('User', 'id', 'user_id');
    }
}
