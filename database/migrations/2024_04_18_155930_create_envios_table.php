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
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->enum('empresa_paqueteria',['UPS Access Point', 'InPost', 'Correos', 'SEUR', 'DHL', 'GSL']);
            $table->enum('tipo_envio',['Estandar', 'Express', 'Recogida en Tienda']);
            $table->string('zona_entrega');
            $table->foreignId('id_pago')->constrained('pagos');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
