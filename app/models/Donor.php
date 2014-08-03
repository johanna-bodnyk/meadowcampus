<?php

    class Donor extends Eloquent {

        public function user() {
            return $this->belongsTo('User');
        }

        public function types() {
            return $this->belongsToMany('Type');
        }
        
    }

?>