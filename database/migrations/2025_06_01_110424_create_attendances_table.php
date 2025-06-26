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
        Schema::create('ebs_training_attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('participant_name');
            $table->string('participant_email');
            $table->string('participant_phone')->nullable();
            $table->date('session_date');
            $table->string('venue')->nullable();
            $table->string('session_day')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->tinyInteger('attendance_status')->default(0)->comment('0=Absent, 1=Present, 2=Late');
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('marked_by')->nullable();
            $table->timestamp('marked_at')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('marked_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            
            // Indexes
            $table->index(['batch_id', 'session_date']);
            $table->index(['training_id', 'session_date']);
            $table->unique(['batch_id', 'user_id', 'session_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebs_training_attendance');
    }
};
