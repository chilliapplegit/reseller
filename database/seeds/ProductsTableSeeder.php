<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'reseller_id' => 1,
            'name' => 'product',
            'sku' => 'product',
            'price' => '10.00',
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'reseller_id' => 1,
            'name' => 'product 1',
            'sku' => 'product-1',
            'price' => '20.00',
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'reseller_id' => 2,
            'name' => 'product 2',
            'sku' => 'product-2',
            'price' => '30.00',
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'reseller_id' => 2,
            'name' => 'product 3',
            'sku' => 'product-3',
            'price' => '40.00',
            'created_at' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
