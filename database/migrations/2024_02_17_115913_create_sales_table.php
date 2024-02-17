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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->string('invoice_number')->unique();
            $table->date('sale_date');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->enum('status', ['Ordered', 'Confirm', 'Shipping', 'Delivered'])->default('Ordered');
            $table->string('payment');
            $table->string('total_payment');
            $table->enum('payment_status', ['Paid', 'Unpaid', 'partially Paid'])->default('Unpaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
