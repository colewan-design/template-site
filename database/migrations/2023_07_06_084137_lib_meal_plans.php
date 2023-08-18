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
        Schema::create('lib_meal_plans', function(Blueprint $table) {
            $table->id('lib_meal_plan_id');
            $table->string('meal_plan_name', 255);
            $table->string('meal_plan_ref', 255);
            $table->string('product_ref', 255);
            $table->double('product_qty', 4, 2)->nullable();
            $table->string('lib_diet_types_ref', 255)->nullable();
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
