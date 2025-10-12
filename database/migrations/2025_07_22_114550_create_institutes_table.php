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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 255)->nullable();
            $table->string('address', 255);
            $table->string('contact_number', 100);
            $table->string('email', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('logo_path', 255)->nullable(); // made nullable and length extended for safety
            $table->string('status', 20)->default('1'); // default should be a string, not int
            $table->unsignedBigInteger('insert_by'); // remove the 2nd argument (invalid for this type)
            $table->timestamps();

            // Optional: add foreign key constraint if 'insert_by' references users table
            // $table->foreign('insert_by')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
