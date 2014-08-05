<?php

class UserSeeder extends Seeder {
    
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE users');

    $user = new User();
    $user->first_name = "Johanna";
    $user->last_name = "Bodnyk";
    $user->email = "bodnyk@gmail.com";
    $user->password = Hash::make('password');
    $user->save();

    $user = new User();
    $user->first_name = "Julia";
    $user->last_name = "James";
    $user->email = "julia@circleschool.org";
    $user->password = Hash::make('password');
    $user->save();

    $user = new User();
    $user->first_name = "Catherine";
    $user->last_name = "Bodnyk";
    $user->email = "cbodnyk@gmail.com";
    $user->password = Hash::make('password');
    $user->save();

    }

}