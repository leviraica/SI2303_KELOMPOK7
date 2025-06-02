<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama distributor
            $table->string('email')->unique();
            $table->string('address'); // Alamat distributor
            $table->string('phone_number'); // Kontak distributor
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};