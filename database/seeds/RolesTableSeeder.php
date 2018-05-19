<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
                            'name' => 'Organisation',
                            'user_id'     => 1
                            
                        ]);

        \App\Models\Role::create([
                            'name' => 'Administrator',
                            'user_id'     => 1
                            
                        ]);

        \App\Models\Role::create([
                            'name' => 'Seller',
                            'user_id'     => 1
                            
                        ]);

        \App\Models\Role::create([
                            'name' => 'Buyer',
                            'user_id'     => 1
                            
                        ]);

        
    }
}