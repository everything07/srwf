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
            $table->renameColumn('sinaArrival','sina_arrival_minute');
            $table->renameColumn('sinaDeparture', 'sina_departure_minute');
            $table->renameColumn('tokyoArrival', 'tokyo_arrival_minute');
            $table->renameColumn('tokyoDeparture', 'tokyo_departure_minute');
            $table->renameColumn('uenoArrival', 'ueno_arrival_minute');
            $table->renameColumn('uenoDeparture', 'ueno_departure_minute');
            $table->renameColumn('ikebukuroArrival', 'ikebukuro_arrival_minute');
            $table->renameColumn('ikebukuroDeparture', 'ikebukuro_departure_minute');
            $table->renameColumn('sinjukuArrival', 'sinjuku_arrival_minute');
            $table->renameColumn('sinjukuDeparture', 'sinjuku_departure_minute');
            $table->renameColumn('osakiArrival', 'osaki_arrival_minute');
            $table->renameColumn('osakiDeparture', 'osaki_departure_minute');
        });
        
       
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
            
        Schema::table('deferred_records', function (Blueprint $table) {
            //
            
        });
    }
};
