<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'Alexis',
                'email' => 'chouk1991@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => 1,
                'avatar' => 'alexisAvenel.jpg'
            ]);
    }
}
