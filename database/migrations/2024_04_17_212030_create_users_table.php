<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_usuario')->unique();
            $table->string('apellido');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('admin')->default(false);
            $table->string('telefono');
            $table->string('ciudad');
            $table->string('pais');
            $table->string('calle');
            $table->string('codigo_postal');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
