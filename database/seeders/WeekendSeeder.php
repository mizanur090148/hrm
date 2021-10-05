<?php

namespace Database\Seeders;

use App\Models\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekendSeeder extends Seeder
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
            'weekend_day_name' => 'Friday',
            'last_change_date' => $date_time->toDateString(),
            'factory_id' => Factory::first()->id ?? 1,
            'created_at' => $date_time,
            'updated_at' => $date_time
        ];

        DB::table('weekends')->truncate();
        DB::table('weekends')->insert($roles);

        $this->command->info('Successfully run weekend seeder');
    }
}
