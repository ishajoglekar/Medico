<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_temp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger("doctor_id");
            $table->unsignedBiginteger("appointment_id");
            
            $table->timestamps();

            $table->foreign('doctor_id')
            ->references('id')
            ->on('doctors');
            $table->foreign('appointment_id')
            ->references('id')
            ->on('appointments');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_temp');
    }
}
