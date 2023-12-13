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
        Schema::create('crewing_diary_user', function (Blueprint $table) {
            $table->foreignId('crewing_diary_id')->constrained('crewing_diaries'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->primary(['crewing_diary_id', 'user_id']);  
            // 日記のid、userテーブルのid
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crewing_diary_user');
    }
};
