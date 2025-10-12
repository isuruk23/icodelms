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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
              $table->string('full_name', 100);
            $table->string('contact_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('expertise', 100)->nullable();
            $table->string('photo_path', 255)->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
