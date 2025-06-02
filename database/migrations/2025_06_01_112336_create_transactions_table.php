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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('type', ['Issue', 'Receipt', 'Purchase','Purchase Return']);
            $table->foreignId('consumer_id')->constrained('consumers')->restrictOnDelete();
            $table->foreignId('item_id')->constrained('items')->restrictOnDelete();
            $table->string('sku');
            $table->decimal('quantity', 8, 2);
            $table->text('note')->nullable();
             $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
