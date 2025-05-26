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
    Schema::create('speakers', function (Blueprint $table) {
        $table->id();
        $table->string('profile_image')->nullable();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('designation');
        $table->unsignedTinyInteger('experience_years');
        $table->unsignedInteger('total_projects')->nullable();
        $table->enum('status', ['active', 'deactive', 'pending']);
        $table->text('expertise');
        $table->text('bio')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
