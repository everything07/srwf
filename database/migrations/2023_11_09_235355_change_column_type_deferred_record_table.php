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
        Schema::table('deferred_record', function (Blueprint $table) {
            //
            $table->Integer('sinaArrivalMinute')->change();
            $table->Integer('sinaDepartureMinute')->change();
            $table->Integer('tokyoArrivalMinute')->change();
            $table->Integer('tokyoDepartureMinute')->change();
            $table->Integer('uenoArrivalMinute')->change();
            $table->Integer('uenoDepartureMinute')->change();
            $table->Integer('ikebukuroArrivalMinute')->change();
            $table->Integer('sinjukuArrivalMinute')->change();
            $table->Integer('sinjukuDepartureMinute')->change();
            $table->Integer('osakiArrivalMinute')->change();
            $table->Integer('osakiDepartureMinute')->change();
        });
        
        Schema::table('deferred_record', function (Blueprint $table) {
            //
            $table->Integer('sinaArrivalSecond');
            $table->Integer('sinaDepartureSecond');
            $table->Integer('tokyoArrivalSecond');
            $table->Integer('tokyoDepartureSecond');
            $table->Integer('uenoArrivalSecond');
            $table->Integer('uenoDepartureSecond');
            $table->Integer('ikebukuroArrivalSecond');
            $table->Integer('sinjukuArrivalSecond');
            $table->Integer('sinjukuDepartureSecond');
            $table->Integer('osakiArrivalSecond');
            $table->Integer('osakiDepartureSecond');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('deferred_record', function (Blueprint $table) {
            //
            $table->time('sinaArrivalMinute')->change();
            $table->time('sinaDepartureMinute')->change();
            $table->time('tokyoArrivalMinute')->change();
            $table->time('tokyoDepartureMinute')->change();
            $table->time('uenoArrivalMinute')->change();
            $table->time('uenoDepartureMinute')->change();
            $table->time('ikebukuroArrivalMinute')->change();
            $table->time('sinjukuArrivalMinute')->change();
            $table->time('sinjukuDepartureMinute')->change();
            $table->time('osakiArrivalMinute')->change();
            $table->time('osakiDepartureMinute')->change();
        });
    }
};
