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
        Schema::create('deferred_record_occurrence_reason', function (Blueprint $table) {
            $table->foreignId('deferred_record_id')->constrained('deferred_records'); // deferred_records テーブルへの外部キー
            $table->foreignId('occurrence_reason_id')->constrained('occurrence_reasons'); // occurrence_reasons テーブルへの外部キー
            $table->primary([ 'deferred_record_id','occurrence_reason_id']);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deferred_record_occurrence_reason');
    }
};
