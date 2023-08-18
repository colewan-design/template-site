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
        Schema::create('lib_baskets', function (Blueprint $table) {
            $table->id();
            $table->string("basket_code")->nullable();
            $table->string("basket_size")->nullable();
            $table->json("basket_item")->nullable();
            $table->double("basket_amount")->nullable();
            $table->date("from")->nullable();
            $table->date("to")->nullable();
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
        Schema::dropIfExists('lib_baskets');
    }
};
