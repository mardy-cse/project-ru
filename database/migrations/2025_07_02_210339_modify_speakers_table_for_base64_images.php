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
        Schema::table('speakers', function (Blueprint $table) {
            // Change profile_image and signature columns to longText to store Base64 strings
            $table->longText('profile_image')->nullable()->change();
            $table->longText('signature')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('speakers', function (Blueprint $table) {
            // Revert back to string type
            $table->string('profile_image')->nullable()->change();
            $table->string('signature')->nullable()->change();
        });
    }
};
