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
        Schema::create('fertilisers_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->foreign('person_id')->references('id')->on('people');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('fertiliser_id')->nullable();
            $table->foreign('fertiliser_id')->references('id')->on('fertilisers');
            $table->string('delivery_note_no');
            $table->string('internal_delivery_no');
            $table->string('no_of_packs');
            $table->string('receipt_no');
            $table->string('destination');
            $table->string('type');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fertilisers_transactions');
    }
};
