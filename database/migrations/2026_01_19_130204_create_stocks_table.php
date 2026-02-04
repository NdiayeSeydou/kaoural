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
        Schema::create('stocks', function (Blueprint $table) {

            $table->id();

            $table->date('date');

            $table->string('code_article')->unique();

            $table->string('image')->nullable();

            $table->string('designation');

            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();

            $table->decimal('stock_initial', 10, 2);

            $table->decimal('quantite_entree', 10, 2)->default(0);

            $table->decimal('quantite_sortie', 10, 2)->default(0);

            $table->decimal('prix_unitaire', 12,2)->default(0);

            $table->decimal('prix_total', 14,2)->default(0);

            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->cascadeOnDelete();

            $table->enum('emplacement', ['boutique', 'magasin']);

            $table->decimal('quantite_restante', 10, 2)->default(0);

            $table->enum('status', ['disponible', 'rupture', 'baisse']);
    
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
