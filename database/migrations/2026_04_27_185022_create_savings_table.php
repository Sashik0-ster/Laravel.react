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
        Schema::create('savings', function (Blueprint $table) {
            $table->id('saving_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->foreignId('currency_id')
                ->constrained('currencies', 'currency_id')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->enum('saving_type', ['deposit', 'investment', 'cash', 'other']);
            $table->date('saving_date');
            $table->text('description')->nullable();
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->date('maturity_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
