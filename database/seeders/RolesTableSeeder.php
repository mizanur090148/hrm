<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_time = Carbon::today();
        
        $roles = [ 
        	[ 
        		'name' => 'Supper Admin',
                'slug' => 'super-admin',
                'created_at' => $date_time,
                'updated_at' => $date_time
        	], 
        	[ 
        		'name' => 'Admin',
                'slug' => 'admin',
                'created_at' => $date_time,
                'updated_at' => $date_time
        	],        	
        	[   
        		'name' => 'User',
                'slug' => 'user',
                'created_at' => $date_time,
                'updated_at' => $date_time
        	]
        ];

        DB::table('roles')->truncate();
        DB::table('roles')->insert($roles);

        $this->command->info('Successfully run roles table seeder');
    }
}
