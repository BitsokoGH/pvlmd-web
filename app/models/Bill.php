<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bill
 *
 * @author skwakwa
 */
class Bill extends Eloquent {

    //put your code here
    protected $table = 'bill';

    public function user() {
        return $this->hasOne('User', 'id', 'user_id');
    }

}
