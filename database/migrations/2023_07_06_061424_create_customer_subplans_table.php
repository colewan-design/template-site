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
        Schema::create('customer_subplans', function (Blueprint $table) {
            $table->id('customer_subplan_id');
            $table->string('customer_ref', 255);
            $table->string('subplan_ref', 255);
            $table->date('subplan_start_date')->nullable();
            $table->date('subplan_end_date')->nullable();
            $table->date('subplan_cancelled_date')->nullable();
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
        Schema::dropIfExists('customer_subplans');
    }
};
