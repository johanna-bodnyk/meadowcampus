<?php

    class Donor extends Eloquent {

        protected $guarded = array('id');
       
        public function scopeGroup($query, $group) {
            return $query->where('donor_group', '=', $group)
                ->where('pledge_made_flag', '=', true);
        }
    }

?>