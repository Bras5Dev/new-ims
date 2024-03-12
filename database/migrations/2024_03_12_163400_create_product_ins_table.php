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
        Schema::create('product_ins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');

            $table->enum('payment_method', ['cash', 'bank']);
            $table->foreignId('bank_id')->constrained('banks');
            $table->string('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ins');
    }
};
