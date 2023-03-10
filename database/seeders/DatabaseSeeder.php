<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Model::unguard();

        $this->call([
            UserSeeder::class,
            MemberSeeder::class,
            EmployeeSeeder::class,
            BookSeeder::class,
        ]);

        Model::reguard();
    }
}
