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
            $table->string('name');
            $table->string('category1');
            $table->string('category2');
            $table->text('category3');
            $table->string('description')->nullable();
            $table->decimal('quantity', 15, 2)->default(0.00);
            $table->decimal('reorder_value', 15, 2)->default(0.00);
            $table->decimal('balance', 15, 2)->default(0.00);
            $table->string('description')->nullable();
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
