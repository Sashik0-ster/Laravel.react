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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expense_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories', 'category_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts','account_id')->onDelete('cascade');
            $table->decimal('amount', 12, 2)->default(0);
            $table->foreignId('currency_id')
                ->constrained('currencies', 'currency_id')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('description')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->date('expense_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
