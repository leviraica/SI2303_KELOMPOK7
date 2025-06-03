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
        Schema::table('products', function (Blueprint $table) {
            // Menghapus foreign key constraint pada distributor_id
            $table->dropForeign(['distributor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan foreign key constraint pada distributor_id
            $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
        });
    }
};
