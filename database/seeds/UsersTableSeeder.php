<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user =array(
              'name' => 'esraa',
              'email' => 'esraa@hotmail.com',
              'password' => Hash::make('esraa'),
              'role_id' =>'1',
              'is_active'=>'0'

          );
          DB::table('users')->insert ($user);
    }
}
