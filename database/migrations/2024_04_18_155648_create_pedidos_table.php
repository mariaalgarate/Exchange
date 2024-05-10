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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_envio',['Estandar', 'Express', 'Recogida en Tienda']);
            $table->enum('estado_pago',['Pagado', 'Procesando', 'Cancelado', 'Reembolsado']);
            $table->double('precio_total');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->nullable();
            $table->string('direccion_envio');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_producto')->constrained('productos');
            $table->foreignId('id_pago')->constrained('pagos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
