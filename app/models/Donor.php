<?php

    class Donor extends Eloquent {
       
        public function scopeGroup($query, $group) {
            return $query->where('donor_group', '=', $group)
                ->where('pledge_amount', '>', 0);
        }
    }

?>