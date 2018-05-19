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
        \App\User::create([
                            'first_name' => 'Ronald',
                            'last_name'  => 'Tuibeo',
                            'email'      => 'ronald.tuibeo@gmail.com',
                            'password'   => \Illuminate\Support\Facades\Hash::make('pass'),
                            'status'     => 1
                            
                        ]);

        
    }
}