<?php

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    // DB::table('users')->delete();
    
    $user = array(
      'first_name' => 'Arjun',
      'last_name' => 'Sunar',
      'email'    => 'arjukoid@gmail.com',
      'password' => Hash::make('password'),
      'is_active'=>1,
      'role' => 'admin'
    ));
    DB::table('users')->insert($user);

  }