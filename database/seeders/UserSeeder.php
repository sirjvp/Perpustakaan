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
        $user->username = 'admin_a';
        $user->email = 'admina@admin.com';
        $user->first_name = 'Admin';
        $user->last_name = 'A';
        $user->password = Hash::make('passwordadmin');
        $user->email_verified_at = '2022-12-17 06:00:00';
        $user->is_admin = '1';
        $user->save();
    }
}
