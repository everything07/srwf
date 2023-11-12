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
        Schema::table('deferred_records', function (Blueprint $table) {
            //
            $table->Integer('sina_arrival_minute')->change();
            $table->Integer('sina_departure_minute')->change();
            $table->Integer('tokyo_arrival_minute')->change();
            $table->Integer('tokyo_departure_minute')->change();
            $table->Integer('ueno_arrival_minute')->change();
            $table->Integer('ueno_departure_minute')->change();
            $table->Integer('ikebukuro_arrival_minute')->change();
            $table->Integer('ikebukuro_departure_minute')->change();
            $table->Integer('sinjuku_arrival_minute')->change();
            $table->Integer('sinjuku_departure_minute')->change();
            $table->Integer('osaki_arrival_minute')->change();
            $table->Integer('osaki_departure_minute')->change();
        });
        
        Schema::table('deferred_records', function (Blueprint $table) {
            //
            $table->Integer('sina_arrival_second');
            $table->Integer('sina_departure_second');
            $table->Integer('tokyo_arrival_second');
            $table->Integer('tokyo_departure_second');
            $table->Integer('ueno_arrival_second');
            $table->Integer('ueno_departure_second');
            $table->Integer('ikebukuro_arrival_second');
            $table->Integer('ikebukuro_departure_second');
            $table->Integer('sinjuku_arrival_second');
            $table->Integer('sinjuku_departure_second');
            $table->Integer('osaki_arrival_second');
            $table->Integer('osaki_departure_second');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('deferred_records', function (Blueprint $table) {
            //
            $table->time('sina_arrival_minute')->change();
            $table->time('sina_departure_minute')->change();
            $table->time('tokyo_arrival_minute')->change();
            $table->time('tokyo_departure_minute')->change();
            $table->time('ueno_arrival_minute')->change();
            $table->time('ueno_departure_minute')->change();
            $table->time('ikebukuro_arrival_minute')->change();
            $table->time('ikebukuro_departure_minute')->change();
            $table->time('sinjuku_arrival_minute')->change();
            $table->time('sinjuku_departure_minute')->change();
            $table->time('osaki_arrival_minute')->change();
            $table->time('osaki_departure_minute')->change();
        });
    }
};
