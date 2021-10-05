<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();
        // super admin
        $super_admin = User::find(1);
        $super_admin_role_id = [1]; // 1 = super admin 
		$super_admin->roles()->attach($super_admin_role_id);

		// admin
        $admin = User::find(2);
        $admin_role_id = [2]; // 2 = admin
		$admin->roles()->attach($admin_role_id);

		// user
        $user = User::find(3);
        $user_role_id = [3]; // 3 = user
		$user->roles()->attach($user_role_id);

		$this->command->info('Successfully run user role table seeder');
    }
}
