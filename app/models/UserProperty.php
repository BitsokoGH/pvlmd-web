<?php

class UserProperty extends Eloquent {

    //put your code here
    protected $table = 'property_user';

    public function userDetail() {
        return $this->hasOne('User', 'id', 'user_id');
    }

    public function property() {
        return $this->hasOne('Property', 'property_id', 'property_id');
    }

}
