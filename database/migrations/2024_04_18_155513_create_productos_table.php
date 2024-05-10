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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('estado',['Muy bueno', 'Bueno', 'Desgastado']);
            $table->enum('transaccion',['Intercambio', 'Venta', 'Ambas']);
            $table->double('precio_unitario');
            $table->integer('stock');
            $table->string('imagen')->nullable();
            $table->integer('cantidad');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
