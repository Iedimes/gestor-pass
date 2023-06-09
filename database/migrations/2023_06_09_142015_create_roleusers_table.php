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
        Schema::create('roleusers', function (Blueprint $table) {
           $table->id();
            $table->integer('admin_users_id');
            $table->foreign('admin_users_id')->references('id')->on('admin_users');
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles');


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
        Schema::dropIfExists('roleusers');
    }
};
