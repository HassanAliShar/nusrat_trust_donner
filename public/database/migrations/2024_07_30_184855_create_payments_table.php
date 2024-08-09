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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('recept_no');
            $table->string('amount')->nullable();
            $table->string('payment_month');
            $table->string('payment_date');
            $table->unsignedBigInteger('donor_id');
            $table->string('type')->nullable();
            $table->foreign('donor_id')->references('id')->on('donors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
