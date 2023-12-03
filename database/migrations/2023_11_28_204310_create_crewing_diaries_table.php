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
        Schema::create('crewing_diaries', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('weather');
            $table->string('time_period');
            $table->string('title');
            $table->text('body');
            $table->integer('sympathy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crewing_diaries');
    }
};
