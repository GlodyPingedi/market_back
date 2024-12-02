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
        Schema::create('detail_ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vente_id')
                ->constrained('ventes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('produit_id')
                ->constrained('produits')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 15, 2);
            $table->decimal('sous_total', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ventes');
    }
};
