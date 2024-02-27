<?php

use App\Models\User;
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
        Schema::create('expenses_records', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('amount');
            $table->date('date');
            $table->foreignIdFor(User::class, 'user_id')->constrained();
            $table->string('bill')->nullable();
            $table->string('bank_name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_records');
    }
};