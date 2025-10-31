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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->decimal('sale_price',8,2);
            $table->foreignId('invoice_id')->constrained('invoices')->cascadeOnDelete()->restrictOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->restrictOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
