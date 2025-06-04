<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        // Check if category_id column exists
        if (!Schema::hasColumn('products', 'category_id')) {
            $table->foreignId('category_id')->constrained('categories');
        }
        
        // Or if you're using category_id instead
        // if (!Schema::hasColumn('products', 'category_id')) {
        //    $table->foreignId('category_id')->constrained('categories');
        // }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
