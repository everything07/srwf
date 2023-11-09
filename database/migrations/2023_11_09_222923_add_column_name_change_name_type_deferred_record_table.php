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
        // Schema::table('deferred_record', function (Blueprint $table) {
        //     //
        //     $table->renameColumn('sinaArrival','sinaArrivalMinute');
        //     $table->renameColumn('sinaDeparture', 'sinaDepartureMinute');
        //     $table->renameColumn('tokyoArrival', 'tokyoArrivalMinute');
        //     $table->renameColumn('tokyoDeparture', 'tokyoDepartureMinute');
        //     $table->renameColumn('uenoArrival', 'uenoArrivalMinute');
        //     $table->renameColumn('uenoDeparture', 'uenoDepartureMinute');
        //     $table->renameColumn('ikebukuroArrival', 'ikebukuroArrivalMinute');
        //     $table->renameColumn('sinjukuArrival', 'sinjukuArrivalMinute');
        //     $table->renameColumn('sinjukuDeparture', 'sinjukuDepartureMinute');
        //     $table->renameColumn('osakiArrival', 'osakiArrivalMinute');
        //     $table->renameColumn('osakiDeparture', 'osakiDepartureMinute');
        // });
        
       
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
            
        Schema::table('deferred_record', function (Blueprint $table) {
            //
            
        });
    }
};
