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
        Schema::create('cheque_receives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->date('cheque_date');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('bank_id');
            $table->decimal('amount', 10, 2);
            $table->string('receivetype');
            $table->string('cheque_receiver_name');
            $table->string('cheque_number');
            $table->boolean('is_fly_cheque');
            $table->string('cheque_status')->default('Pending')->nullable();
            $table->date('cheque_clearing_date')->nullable();
            $table->string('cheque_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheque_receives');
    }
};
