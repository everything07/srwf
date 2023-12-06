<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToCrewingDiaries extends Migration
{
    public function up()
    {
        Schema::table('crewing_diaries', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('crewing_diaries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
