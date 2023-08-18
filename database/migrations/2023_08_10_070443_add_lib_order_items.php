<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lib_cart_orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->nullable();
            $table->string('sku')->nullable();
            $table->double('item_amount')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('item_quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
