<?php

    class Donor extends Eloquent {

        protected $guarded = array('id');
        public $timestamps = false;

        public static function getGroupNames() {
            return array(
                'Alumni' => 'Alumni',
                'Alumni Families' => 'Alumni Families',
                'Current Families' => 'Current Families',
                'Current Students' => 'Current Students',
                'Staff' => 'Staff',
                'Friends' => 'Friends'
            );
        }
       
        public function scopeGroup($query, $group) {
            return $query->where('donor_group', '=', $group)
                ->where('pledge_made_flag', '=', true);
        }

        public function scopeSchoolMeeting($query) {
            return $query->whereIn('donor_group', array('Current Students', 'Staff'))
                ->where('pledge_made_flag', '=', true);
        }
    }

?>