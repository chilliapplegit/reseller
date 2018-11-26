<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reseller_id');
            $table->unsignedInteger('customer_id');
            $table->foreign('reseller_id')
                        ->references('id')
                        ->on('resellers')
                        ->onDelete('cascade');
            $table->foreign('customer_id')
                        ->references('id')
                        ->on('customers')
                        ->onDelete('cascade');
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_reseller_id_foreign');
            $table->dropForeign('orders_customer_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}
