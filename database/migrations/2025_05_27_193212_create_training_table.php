<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // required
            $table->unsignedInteger('training_category_id'); // required

            $table->longText('training_overview'); // required
            $table->longText('course_qualification'); // required
            $table->longText('training_objective'); // required
            $table->longText('training_outline'); // required

            $table->string('course_thumbnail'); // required
            $table->tinyInteger('status'); // required

            $table->timestamps(); // created_at & updated_at will be NOT NULL by default

            $table->unsignedInteger('created_by')->default(0);
            $table->unsignedInteger('updated_by')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training');
    }
};