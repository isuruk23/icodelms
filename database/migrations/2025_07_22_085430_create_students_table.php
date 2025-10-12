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
        Schema::create('students', function (Blueprint $table) {
             $table->id();
            $table->string('student_code', 20)->unique()->nullable();
            $table->string('full_name', 100)->nullable();
            $table->string('nic_passport', 20)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('guardian_name', 100)->nullable();
            $table->string('guardian_contact', 20)->nullable();
            $table->string('photo_path')->nullable();
            $table->string('barcode_image_path')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
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
        Schema::dropIfExists('students');
    }
};
