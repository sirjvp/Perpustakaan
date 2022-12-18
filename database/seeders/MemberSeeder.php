<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new Member();
        $member->phone = '08123123123';
        $member->address = 'Ciputra Waterpak';
        $member->save();

        $member = new Member();
        $member->phone = '08123123123';
        $member->address = 'Ciputra Waterpak';
        $member->save();

        $member = new Member();
        $member->phone = '08123123123';
        $member->address = 'Ciputra Waterpak';
        $member->save();
    }
}
