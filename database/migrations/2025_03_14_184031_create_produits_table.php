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
        Schema::create('produits', function (Blueprint $table) {
            $table->string('numMedoc')->primary();
            $table->string('Design');
            $table->integer('prix_unitaire');
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->index('Design');
            $table->index('numMedoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
