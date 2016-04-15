<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$user = array(
      'first_name' => 'Arjun',
      'last_name' => 'Sunar',
      'email'    => 'arjukoid@gmail.com',
      'password' => Hash::make('password'),
      'is_active'=>1,
      'role' => 'admin'
    ));
    \DB::table('users')->insert($user);
	}

}
