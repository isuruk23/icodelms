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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->decimal('amount', 10, 2);
            $table->string('month', 20); // e.g. 'January', '2025-01', or custom
            $table->date('payment_date');
            $table->string('method', 50)->nullable(); // e.g., cash, card, online
            $table->enum('status', ['paid', 'pending', 'failed'])->default('paid');
            $table->unsignedBigInteger('insert_userid')->nullable();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
