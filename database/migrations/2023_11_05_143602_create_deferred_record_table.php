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
        Schema::create('deferred_record', function (Blueprint $table) {
            $table->id();
            $table->integer('enpoyeeNumber');
            $table->char('trainNumber');
            $table->char('carsNumber');
            $table->char('jobNumber');
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
            $table->string('occurrenceReasons', 50);
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deferred_record');
    }
};
