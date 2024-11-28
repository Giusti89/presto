<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            $table->decimal('monto', 10, 2)->default(0.00);
            $table->decimal('interes', 10, 2)->default(0.00)->nullable();
            $table->date('plazofinal');
            
            $table->unsignedBigInteger('estadopago_id')->default(2);
            $table->foreign('estadopago_id')->references('id')->on('estadopagos')->onDelete('cascade');

            $table->unsignedBigInteger('cliente_id')->default(2);
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
