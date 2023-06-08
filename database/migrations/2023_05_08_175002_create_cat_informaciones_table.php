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
        Schema::create('cat_informaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credenciales_id');
            $table->foreign('credenciales_id')->references('id')->on('credenciales');

            $table->unsignedBigInteger('tipo_debd_id');
            $table->foreign('tipo_debd_id')->references('id')->on('tipo_debd');

            //$table->string('tipo_debd');
            $table->string('nombredebd');
            $table->string('versiones');
            $table->string('ssl');

            $table->date('fecha_vec_dominio');
            $table->date('fecha_vec_ssl');
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
        Schema::dropIfExists('cat_informaciones');
    }
};
