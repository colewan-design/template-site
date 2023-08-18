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
        Schema::create('lib_provinces', function (Blueprint $table) {
            $table->id('province_id'); 
            $table->string('psgc_pcode')->nullable(); 
            $table->string('province')->nullable(); 
            $table->string('psgc_rcode')->nullable(); 
            $table->string('region')->nullable(); 
            $table->string('geolocation')->nullable(); 
            $table->softDeletes();
            $table->timestamps();
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
