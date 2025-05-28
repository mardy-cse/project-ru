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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            
            // Training information
            $table->unsignedBigInteger('training_id');
            $table->string('name');
            $table->string('speaker_name');
            
            // Date and time fields
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('class_duration'); // in minutes
            
            // Capacity and sessions
            $table->integer('seat_capacity');
            $table->integer('number_of_sessions');
            $table->integer('total_session_hours');
            $table->integer('total_session_minutes');
            
            // Additional dates
            $table->date('enrollment_deadline');
            $table->date('expected_start_date');
            
            // Location and scheduling
            $table->string('venue');
            $table->string('session_day');
            
            // Status fields
            $table->tinyInteger('batch_status')->comment('1=Active, 0=Inactive, 2=Pending');
            $table->string('visible_platform')->comment('web, mobile, both');
            $table->tinyInteger('publication_status')->comment('1=Published, 0=Unpublished');
            
            // Timestamps and user tracking
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            
            // Indexes
            $table->index(['training_id', 'batch_status']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};