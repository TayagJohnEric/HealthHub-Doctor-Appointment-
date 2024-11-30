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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('doctor_id')->constrained('doctor')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patient')->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->date('appointment_date');
            $table->string('status')->default('pending'); // e.g., 'pending', 'accepted', 'canceled', 'finished'
            $table->timestamp('status_updated_at')->nullable(); // Track when status changes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
