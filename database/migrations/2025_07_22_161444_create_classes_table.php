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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('class_code', 20)->unique();
            $table->string('class_name', 100)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('schedule', 255)->nullable(); // E.g., "Mon-Fri 8:00AM - 10:00AM"
            $table->string('location', 100)->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->string('status', 20)->default('active');
            $table->timestamp('insert_datetime')->useCurrent();
            $table->unsignedBigInteger('insert_userid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
