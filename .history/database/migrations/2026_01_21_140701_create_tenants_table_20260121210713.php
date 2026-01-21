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
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('tenant_id');
            $table->unsignedInteger('room_id')->nullable();

            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->integer('age')->nullable();

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->enum('status', ['Active', 'Past', 'Evicted'])->default('Active');
            $table->string('payment_term', 50)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
