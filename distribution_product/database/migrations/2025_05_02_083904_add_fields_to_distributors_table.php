<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('distributors', function (Blueprint $table) {
            if (!Schema::hasColumn('distributors', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('distributors', 'address')) {
                $table->string('address')->nullable();
            }
            if (!Schema::hasColumn('distributors', 'phone_number')) {
                $table->string('phone_number')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->dropColumn(['email', 'address', 'phone_number']);
        });
    }
};
