
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("reason");
            $table->unsignedBigInteger("type_id");
            $table->string("report_pdf")->nullable();
            $table->unsignedBigInteger("doctor_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("slot_id")->nullable();
            $table->unsignedBigInteger("patient_phoneNo")->nullable();
            $table->string("patient_name")->nullable();
            $table->string("status")->default("pending");
            $table->timestamp("chat_duration")->nullable();

            $table->timestamps();
            $table->foreign('type_id')
            ->references('id')
            ->on('types');

            $table->foreign('doctor_id')
            ->references('id')
            ->on('doctors');

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->foreign('slot_id')
            ->references('id')
            ->on('slots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
