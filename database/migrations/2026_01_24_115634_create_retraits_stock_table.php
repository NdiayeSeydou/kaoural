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
        Schema::create('retraits_stock', function (Blueprint $table) {

            $table->id();

            $table->string('public_id')->unique();

            $table->foreignId('quincaillerie_id')->constrained()->cascadeOnDelete();

            $table->string('stock_public_id');

            $table->string('designation');

            $table->string('code_article')->nullable();

            $table->string('image')->nullable();

            $table->foreignId('categorie_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->decimal('stock_initial', 10, 2)->default(0);

            $table->decimal('quantite_entree', 10, 2)->default(0);

            $table->decimal('quantite_sortie', 10, 2)->default(0);

            $table->decimal('quantite_restante', 10, 2)->default(0);

            $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseurs')->nullOnDelete();

            $table->string('emplacement')->nullable();

            $table->enum('status', ['impayée', 'payée', 'bon', 'sans bon'])->default('sans bon');

            $table->decimal('prix_unitaire', 12,2)->default(0);

            $table->decimal('prix_total', 14,2)->default(0);

            $table->date('date')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retraits_stock');
    }
};
