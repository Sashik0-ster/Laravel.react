<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id('income_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts', 'account_id')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->foreignId('currency_id')->constrained('currencies', 'currency_id');
            $table->foreignId('income_source_id')->constrained('income_sources', 'source_id');
            $table->text('description')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->date('income_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
