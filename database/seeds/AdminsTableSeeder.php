<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'test',
            'email' => 'paris@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
