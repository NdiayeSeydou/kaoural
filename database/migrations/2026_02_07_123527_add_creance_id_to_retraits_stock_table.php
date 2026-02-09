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
        Schema::table('retraits_stock', function (Blueprint $table) {

            $table->foreignId('creance_id')->nullable()->constrained('creances')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retraits_stock', function (Blueprint $table) {
            
        $table->dropForeign(['creance_id']);
        
        $table->dropColumn('creance_id');

        });
    }
};
