<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
            'fullname'   => 'Armando',
            'email'  => 'dudungjoko@yahoo.com',
            'password'   => bcrypt('123456'),
            'phone'  => '089991117001',
            'gender' => 'Male',
            'address' => 'Jln.Kedepan no 40',
            'profile_picture' => 'arman.jpg',
            'role'  => 'Admin'
          ],
          [
            'fullname'   => 'Arsati',
            'email'  => 'Arsati2@yahoo.com',
            'password'   => bcrypt('123456'),
            'phone'  => '089991117002',
            'gender' => 'Male',
            'address' => 'Jln.Kebelakang no 40',
            'profile_picture' => '',
            'role'  => 'User'
          ],
          [
            'fullname'   => 'Alexander',
            'email'  => 'Alexander3@yahoo.com',
            'password'   => bcrypt('123456'),
            'phone'  => '089991117003',
            'gender' => 'Male',
            'address' => 'Jln.Kekiri no.40',
            'profile_picture' => '',
            'role'  => 'User'
          ],
          [
            'fullname'   => 'Fauqhi',
            'email'  => 'Fauqhi4@yahoo.com',
            'password'   => bcrypt('123456'),
            'phone'  => '089991117004',
            'gender' => 'Male',
            'address' => 'Jln.Kekiri no.40',
            'profile_picture' => '',
            'role'  => 'User'
          ]     
        ]);
    }
}
