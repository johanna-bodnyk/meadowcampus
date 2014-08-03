<?php

class Type extends Eloquent {

    public $timestamps = false;

    public function donors() {
        return $this->belongsToMany('Donor');
    }
    
}

?>