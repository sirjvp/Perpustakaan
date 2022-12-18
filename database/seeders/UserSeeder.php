<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'AdminA';
        $user->email = 'admin_a@admin.com';
        $user->first_name = 'Admin';
        $user->last_name = 'A';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2022-12-17 06:00:00';
        $user->is_admin = '1';
        $user->save();

        $user = new User();
        $user->username = 'UserA';
        $user->email = 'user_a@user.com';
        $user->first_name = 'User';
        $user->last_name = 'A';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2022-12-17 06:00:00';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'UserB';
        $user->email = 'user_b@user.com';
        $user->first_name = 'User';
        $user->last_name = 'B';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2022-12-17 06:00:00';
        $user->is_admin = '0';
        $user->save();

        $user = new User();
        $user->username = 'UserC';
        $user->email = 'user_c@user.com';
        $user->first_name = 'User';
        $user->last_name = 'C';
        $user->password = Hash::make('passworduser');
        $user->email_verified_at = '2022-12-17 06:00:00';
        $user->is_admin = '0';
        $user->save();
    }
}
