<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
                'password' => bcrypt('admin'),
                'is_admin' => 1,
                'avatar' => 'alexisAvenel.jpg'
            ]);
    }
}
