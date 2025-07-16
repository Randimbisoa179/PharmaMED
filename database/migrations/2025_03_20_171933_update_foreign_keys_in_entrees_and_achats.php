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
        Schema::table('entrees', function (Blueprint $table) {
            $table->dropForeign(['numMedoc']); //Supprimer l'ancienne clé étrangère
            $table->foreign('numMedoc')->references('numMedoc')->on('produits')->onDelete('cascade'); //Ajouter la nouvelle clé étrangère
        });

        Schema::table('achats', function(Blueprint $table){
            $table->dropForeign(['numMedoc']); //Supprimer l'ancienne clé étrangère
            $table->foreign('numMedoc')->references('numMedoc')->on('produits')->onDelete('cascade'); //Ajouter la nouvelle clé étrangère
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entrees', function (Blueprint $table) {
            $table->dropForeign(['numMedoc']); //Supprimer la nouvelle clé étrangère
            $table->foreign('numMedoc')->references('numMedoc')->on('produits'); //Revenir à l'ancienne clé étrangère
        });

        Schema::table('achats', function(Blueprint $table){
            $table->dropForeign(['numMedoc']); //Supprimer la nouvelle clé étrangère
            $table->foreign('numMedoc')->references('numMedoc')->on('produits'); //Revenir à l'ancienne clé étrangère
        });
    }
};
