<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('distributors', function (Blueprint $table) {
            if (Schema::hasColumn('distributors', 'contact')) {
                $table->dropColumn('contact'); // Menghapus kolom 'contact' jika ada
            }
        });
    }

    public function down(): void
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->string('contact')->nullable(); // Menambahkan kembali kolom 'contact' jika perlu rollback
        });
    }
};
