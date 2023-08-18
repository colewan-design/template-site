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
        Schema::create('customer_delivery_addresses', function (Blueprint $table) {
            $table->id('customer_delivery_addr_id');
            $table->string('customer_ref', 255);
            $table->string('delivery_addr_house_num', 255);
            $table->string('delivery_addr_brgy_code', 255);
            $table->string('delivery_addr_muncity_code', 255);
            $table->string('delivery_addr_province_code', 255);
            $table->boolean('is_primary_addr')->nullable();
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
