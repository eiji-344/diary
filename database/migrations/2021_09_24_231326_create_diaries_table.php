<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->date('date');
            $table->string('with');
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            
            $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade")
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries');
    }
}
