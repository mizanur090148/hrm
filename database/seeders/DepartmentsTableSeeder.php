<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_time = Carbon::today();

        $departments = [
        	[
        		'name' => 'HR',
        		'slug' => 'hr'
        	],
        	[
        		'name' => 'Admin',
        		'slug' => 'admin'
        	],
        	[
        		'name' => 'Production',
        		'slug' => 'production'
        	]
        ];

        DB::table('departments')->truncate();
        DB::table('departments')->insert($departments);
    }
}
