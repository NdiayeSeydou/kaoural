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
        Schema::create('ventes', function (Blueprint $table) {

            $table->id();

            $table->string('public_id')->unique();

            $table->date('date_vente');

            $table->foreignId('stock_id')->constrained('stocks')->cascadeOnDelete();

            $table->string('designation');

            $table->string('image')->nullable();

            $table->string('code_article');

            $table->decimal('quantite', 10, 2);

            $table->decimal('prix_unitaire', 12, 2);

            $table->decimal('prix_total', 14, 2);

            $table->enum('emplacement', ['boutique', 'magasin']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
