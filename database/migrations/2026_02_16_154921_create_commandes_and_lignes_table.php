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
        Schema::create('commandes', function (Blueprint $table) {

            $table->id();

            $table->string('public_id')->unique();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->string('nom_client');   

            $table->string('telephone');

            $table->text('adresse');

            $table->decimal('montant_total', 15,2);

            $table->string('statut')->default('en attente');

            $table->timestamps();

        });

        Schema::create('ligne_commandes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('commande_id')->constrained()->onDelete('cascade');

            $table->string('designation');

            $table->decimal('quantite', 15,2);

            $table->decimal('prix_unitaire',15,2);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commandes');

        Schema::dropIfExists('commandes');
    }
};
