<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subtitle');
            $table->time('time');
            $table->text('text');
            $table->string('image_path')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('diary_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign("diary_id")
                  ->references("id")
                  ->on("diaries")
                  ->onDelete("cascade");
                  
            $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade");
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
