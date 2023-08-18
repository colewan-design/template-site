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
        Schema::create('customer_bundles', function(Blueprint $table) {
            $table->id('bundle_id');
            $table->string('lib_bundle_type_ref', 255)->nullable();
            $table->string('bundle_ref', 255);
            $table->string('product_ref', 255);
            $table->double('product_qty', 4, 2)->nullable();
            $table->double('product_price', 4, 2)->nullable();
            $table->string('customer_ref', 255);
            $table->date('delivery_date');
            $table->string('meal_plan_ref', 255)->nullable();
            $table->string('subplan_ref', 255);
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
