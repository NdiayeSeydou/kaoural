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
        Schema::create('bon_produits', function (Blueprint $table) {
            
            $table->id();

            $table->foreignId('bon_id')->constrained('bons')->cascadeOnDelete();

            $table->string('produit');

            $table->decimal('quantite', 10, 2);

            $table->string('libelle', 50); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_produits');
    }
};
