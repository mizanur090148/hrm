<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_time = Carbon::today();

        $groups = [
        	[ 
        		'name' => 'Test Group',
        		'address' => 'Mirpur, Dhaka',
                'mobile_no' => '123456789',
                'responsible_person' => 'Mr Akash',
        		'email' => 'mr@test.com',
                'created_at' => $date_time,
                'updated_at' => $date_time
        	]
        ];
  
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('groups')->truncate();
        DB::table('groups')->insert($groups);

        $this->command->info('Successfully run groups table seeder');
    }
}
