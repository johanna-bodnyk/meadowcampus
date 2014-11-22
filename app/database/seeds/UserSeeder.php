<?php

class UserSeeder extends Seeder {
    
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE users');

    $user = new User();
    $user->first_name = "Johanna";
    $user->last_name = "Bodnyk";
    $user->email = "bodnyk@gmail.com";
    $user->password = Hash::make('p@ssw0rd');
    $user->save();
    }

}