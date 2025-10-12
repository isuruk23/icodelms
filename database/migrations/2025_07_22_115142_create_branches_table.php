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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id');
            $table->string('branch_code', 20)->unique();
            $table->string('branch_name', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('contact_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('manager_name', 100)->nullable();
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
        Schema::dropIfExists('branches');
    }
};
