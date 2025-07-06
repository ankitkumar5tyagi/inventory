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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->foreignId('uom_id')->constrained()->restrictOnDelete();
            $table->text('description')->nullable();
            $table->foreignId('group_id')->constrained()->restrictOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->decimal('opening',8, 2)->default(0);
            $table->decimal('opening_price', 8, 2)->default(0);
            $table->decimal('reorder_level',8, 2)->default(0);
            $table->string('godown_id')->constrained()->restrictOnDelete();
            $table->string('location')->nullable();
            $table->boolean('status')->default(TRUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
