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
        
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->decimal('subtotal', 10, 2);
    $table->decimal('shipping', 10, 2);
    $table->decimal('total', 10, 2);
    $table->string('status')->default('pending');
    $table->text('shipping_address');
    $table->string('shipping_city');
    $table->string('shipping_country');
    $table->string('shipping_zip');
    $table->string('payment_method');
    $table->timestamps();
});

Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')->constrained()->cascadeOnDelete();
    $table->foreignId('product_id')->constrained();
    $table->integer('quantity');
    $table->decimal('price', 10, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
