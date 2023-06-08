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
        Schema::create('credenciales', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('contraseña');
            $table->string('enlace');
            $table->date('fecha');
            $table->unsignedBigInteger('servidor_id');
            $table->foreign('servidor_id')->references('id')->on('servidor');
            $table->unsignedBigInteger('tipodeconexion_id');
            $table->foreign('tipodeconexion_id')->references('id')->on('tipodeconexion');
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->unsignedBigInteger('cat_informaciones_id');
            $table->foreign('cat_informaciones_id')->references('id')->on('cat_informaciones');

            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credenciales');
    }
};
