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
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('images')->nullable();
            $table->string('mark');
            $table->string('model');
            $table->string('state_number');
            $table->string('region');
            $table->enum('status', ['Формируется', 'Начат', 'В работе', 'Выполнен', 'Отменен'])->default('Формируется');
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->timestamp('EndTime')->nullable();
            $table->string('full_name_client');
            $table->string('phone_number_client')->nullable();
            $table->string('master')->nullable();
            $table->string('phone_number_master')->nullable();
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
