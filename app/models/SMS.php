<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMS
 *
 * @author skwakwa
 */
class SMS extends Eloquent {
    //put your code here
    
    protected $table = 'sms_manager';
    
     public function user() {
        return $this->hasOne('User', 'id', 'user_id');
    }

}
