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
        Schema::create('lib_diet_types', function(Blueprint $table) {
            $table->id('lib_diet_types_id');
            $table->string('lib_diet_type_ref', 255);
            $table->string('diet_type_name', 255);
            $table->json('lib_bundle_type_ref')->nullable();
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
