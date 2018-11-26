<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resellers')->insert([
            'id' => 1,
            'name' => 'reseller',
            'code' => 'resel123',
            'email' => 'resel@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('resellers')->insert([
            'id' => 2,
            'name' => 'reseller1',
            'code' => 'reseller345',
            'email' => 'resel1@123789.org',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
