<?php

class TypeSeeder extends Seeder {
    
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE types');

        $types = array('student', 'alum', 'parent', 'alum_parent', 'staff', 'alum_staff');

        foreach ($types as $type) {
            Type::create(array('type' => $type));
        }

    }

}