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
            $table->foreignId('voucher_id')->constrained()->restrictOnDelete();
            $table->foreignId('consumer_id')->nullable()->constrained('consumers')->restrictOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained('parties')->restrictOnDelete();
            $table->foreignId('item_id')->constrained('items')->restrictOnDelete();
            $table->string('uom');
            $table->decimal('quantity', 8, 2);
            $table->string('bill_order_no')->nullable();
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
