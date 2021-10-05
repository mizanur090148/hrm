<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_time = Carbon::today();
        
        $users = [ 
            [ 
                'first_name' => 'Mr super',    
                'last_name' => 'admin',
                'mobile_no' => '+88017123456789',
                'address' => 'Uttara, Dhaka',
                'status' => 1,
                'email' => 'super@admin.com',
                'password' => bcrypt(123456),
                'factory_id' => 1,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ], 
            [ 
                'first_name' => 'Mr',  
                'last_name' => 'admin',  
                'mobile_no' => '+88017123456789',
                'address' => 'Uttara, Dhaka',
                'status' => 1,
                'email' => 'admin@admin.com',
                'password' => bcrypt(123456),
                'factory_id' => 1,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],          
            [   
                'first_name' => 'Mr', 
                'last_name' => 'user',     
                'mobile_no' => '+88017123456789',
                'address' => 'Uttara, Dhaka',
                'status' => 1,
                'email' => 'user@user.com',
                'password' => bcrypt(123456),
                'factory_id' => 1,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('users')->insert($users);

        $this->command->info('Successfully run users table seeder');
    }
}
