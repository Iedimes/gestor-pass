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
        Schema::table('cat_informaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_servicios_id')->nullable();
            $table->foreign('tipo_servicios_id')->references('id')->on('tipo_servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cat_informaciones', function (Blueprint $table) {
            //
        });
    }
};
