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
        Schema::table('lib_baskets', function(Blueprint $table) {
            $table->string('sku')->nullable();
            $table->bigInteger('user_id')->nullable();
        });

        Schema::table('lib_basket_items', function(Blueprint $table) {
            $table->string('item_code')->nullable();
            $table->string('sku')->nullable();
            $table->double('item_amount')->nullable();
            $table->bigInteger('user_id')->nullable();
        });

        Schema::table('lib_additionals', function(Blueprint $table) {
            $table->string('additional_code')->nullable();
            $table->string('sku')->nullable();
            $table->double('additional_amount')->nullable();
            $table->bigInteger('user_id')->nullable();
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
