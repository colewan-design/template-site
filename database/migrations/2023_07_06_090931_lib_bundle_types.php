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
        Schema::create('lib_bundle_types', function(Blueprint $table) {
            $table->id('lib_bundle_type_id');
            $table->string('bundle_name', 255);
            $table->json('lib_food_groups_refs');
            $table->string('lib_bundle_type_ref', 255);
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
