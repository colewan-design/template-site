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
        Schema::table('customers', function(Blueprint $table) {
            $table->dropColumn('subplan');
            $table->dropColumn('subplan_ref');
            $table->dropColumn('delivery_schedule_ref');
            $table->dropColumn('registration_date');
        });

        Schema::table('customers', function(Blueprint $table) {
            $table->string('subplan', 255)->nullable();
            $table->string('subplan_ref', 255)->nullable();
            $table->string('delivery_schedule_ref', 255)->nullable();
            $table->date('registration_date')->nullable();
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
