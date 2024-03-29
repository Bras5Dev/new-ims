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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Category::class);
            $table->foreignIdFor(\App\Models\Brand::class);

            $table->string('name');
            $table->string('stock')->default(0);
            $table->string('image');

            $table->integer('quantity_alert')->default(0);
            $table->string('unit');
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
