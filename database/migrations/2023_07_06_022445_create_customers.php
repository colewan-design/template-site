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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_fname', 255);
            $table->string('customer_lname', 255);
            $table->string('customer_ref', 255);
            $table->string('user_email', 255);
            $table->string('password', 255);
            $table->string('contact_number', 11);
            $table->string('main_delivery_addr_house_num', 255);
            $table->string('main_delivery_addr_brgy_code', 255);
            $table->string('main_delivery_addr_muncity_code', 255);
            $table->string('main_delivery_addr_province_code', 255);
            $table->string('main_delivery_addr_brgy', 255)->nullable();
            $table->string('main_delivery_addr_muncity', 255)->nullable();
            $table->string('main_delivery_addr_province', 255)->nullable();
            $table->string('subplan', 255);
            $table->string('subplan_ref', 255);
            $table->json('lib_diet_type_refs')->nullable();
            $table->json('lib_payment_method_refs')->nullable();
            $table->json('bundles_refs')->nullable();
            $table->string('delivery_schedule_ref', 255);
            $table->date('registration_date');
            $table->date('approved_date')->nullable();
            $table->date('subscription_cancelled_date')->nullable();
            $table->integer('delivery_frequency')->nullable();
            $table->text('other_remarks')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
