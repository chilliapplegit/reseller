<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reseller_id');
            $table->foreign('reseller_id')
                        ->references('id')
                        ->on('resellers')
                        ->onDelete('cascade');
            $table->string('name');
            $table->string('sku')->unique();
            $table->float('price');
            $table->boolean('status')->default(true);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_reseller_id_foreign');
        });
        Schema::dropIfExists('products');
    }
}
