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
        Schema::dropIfExists('users');

        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id('id');
                $table->string('name', 255)->nullable();
                $table->string('email', 255)->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password', 255);
                $table->string('remember_token', 100)->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->string('customer_ref', 255)->nullable();
                $table->string('role', 255)->nullable()->comment('Customer/Admin/Merchandiser');
            });
        }
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
