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

            $table->integer('stock_initial');

            $table->integer('quantite_entree')->default(0);

            $table->integer('quantite_sortie')->default(0);

            $table->integer('prix_unitaire')->default(0);

            $table->integer('prix_total')->default(0);

            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->cascadeOnDelete();

            $table->enum('emplacement', ['boutique', 'magasin']);

            $table->integer('quantite_restante');

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
