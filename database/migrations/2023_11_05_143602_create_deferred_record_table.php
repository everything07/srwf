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
        Schema::create('deferred_records', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_number');
            $table->char('train_number');
            $table->char('cars_number');
            $table->char('job_number');
            $table->time('sinaArrival')->nullable();
            $table->time('sinaDeparture')->nullable();
            $table->time('tokyoArrival')->nullable();
            $table->time('tokyoDeparture')->nullable();
            $table->time('uenoArrival')->nullable();
            $table->time('uenoDeparture')->nullable();
            $table->time('ikebukuroArrival')->nullable();
            $table->time('ikebukuroDeparture')->nullable();
            $table->time('sinjukuArrival')->nullable();
            $table->time('sinjukuDeparture')->nullable();
            $table->time('osakiArrival')->nullable();
            $table->time('osakiDeparture')->nullable();
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deferred_records');
    }
};
