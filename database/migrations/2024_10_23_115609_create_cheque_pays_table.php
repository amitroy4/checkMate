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
        Schema::create('cheque_pays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict');
            $table->date('cheque_date');
            $table->foreignId('payee_id')->constrained('vendors')->onDelete('restrict');
            $table->foreignId('bank_id')->constrained('banks')->onDelete('restrict');
            $table->decimal('amount', 10, 2);
            $table->string('paytype');
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
        Schema::dropIfExists('cheque_pays');
    }
};
