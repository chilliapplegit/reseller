<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'id' => 1,
            'name' => 'alan',
            'email' => 'alan@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('customers')->insert([
            'id' => 2,
            'name' => 'ambrose',
            'email' => 'amborse@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('customers')->insert([
            'id' => 3,
            'name' => 'payal',
            'email' => 'payal@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
