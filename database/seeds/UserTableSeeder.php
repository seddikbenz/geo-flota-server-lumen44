<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'seddik benzemame',
            'email' => 'seddik.benz.dev@gmail.com',
            'role' => 'admin',
            'company_id' => 1,
            'password' => app('hash')->make('seddik0540055010'),
            'remember_token' => str_random(10),
        ]);
    }
}
