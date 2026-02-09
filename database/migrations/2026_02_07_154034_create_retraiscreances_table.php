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
        Schema::create('retraiscreances', function (Blueprint $table) {
            $table->id();

            $table->string('public_id')->unique();

            $table->foreignId('creance_id')->constrained('creances')->onDelete('cascade');

            $table->string('stock_public_id');

            $table->string('designation');

            $table->string('code_article');

            $table->string('image')->nullable();

            $table->foreignId('categorie_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->decimal('stock_initial', 15, 2);

            $table->decimal('quantite_sortie', 15, 2);

            $table->decimal('quantite_restante', 15, 2);

            $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseurs')->nullOnDelete();

            $table->string('emplacement')->nullable();

            $table->enum('status', ['impayée', 'payée']);

            $table->decimal('prix_unitaire', 15, 2);

            $table->decimal('prix_total', 15, 2);

            $table->date('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retraiscreances');
    }
};
