<?php
class Property extends Eloquent {

    //put your code here
    protected $table = 'property';

   public function userProperty() {
       return $this->hasMany('UserProperty', 'property_id', 'property_id')->orderBy('property_user.created_at','desc');
    }

    
    public function userActiveProperty() {
        return $this->hasOne("UserProperty", "property_id", "property_id")->where("status","ACTIVE");
    }
    
    
    
}

