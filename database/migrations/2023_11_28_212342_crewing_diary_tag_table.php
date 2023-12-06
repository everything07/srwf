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
        Schema::create('crewing_diary_tag', function (Blueprint $table) 
        {
            $table->foreignId('crewing_diary_id')->constrained('crewing_diaries'); 
            $table->foreignId('tag_id')->constrained('tags'); 
            $table->primary(['crewing_diary_id', 'tag_id']);  
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crewing_diary_tag');
    }
};