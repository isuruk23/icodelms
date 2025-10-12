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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code', 100);
            $table->string('course_name', 100);
            $table->string('description', 255);
            $table->string('duration_weeks', 100);
            $table->string('fee', 100);
            $table->string('status', 11)->default(1);
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
        Schema::dropIfExists('courses');
    }
};
