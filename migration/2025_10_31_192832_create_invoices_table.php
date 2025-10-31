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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('total',50)->unique();
            $table->string('discount',50);
            $table->string('vat',50);
            $table->string('payable',50);
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete()->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->restrictOnDelete();

        

            $table->date('invoice_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
