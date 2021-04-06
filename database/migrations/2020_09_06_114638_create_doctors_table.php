<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->text("description")->nullable();
            $table->string("image")->nullable();
            $table->unsignedBigInteger("fees");
            $table->string("phone_no");
            $table->string("password");
            $table->string("email")->unique();
            $table->unsignedBigInteger("city_id");
            $table->text('address');
            $table->string("gender");
            $table->string("country_code");
            $table->unsignedBigInteger("years_of_exp");
            $table->unsignedBigInteger("slot_duration");
            $table->unsignedBigInteger("speciality_id");
            $table->unsignedBigInteger("reg_no")->unique();
            $table->unsignedBigInteger("regcouncil_id");
            $table->unsignedBigInteger("degree_id");
            $table->unsignedBigInteger("college_id");
            $table->string("establishment_name");
            $table->string("establishment_address");
            $table->string("establishment_pincode");
            $table->unsignedBigInteger("establishment_city_id");
            $table->timestamps();

            $table->foreign('city_id')
            ->references('id')
            ->on('cities');

            $table->foreign('speciality_id')
            ->references('id')
            ->on('specialities');

            $table->foreign('regcouncil_id')
            ->references('id')
            ->on('regcouncils');

            $table->foreign('degree_id')
            ->references('id')
            ->on('degrees');

            $table->foreign('college_id')
            ->references('id')
            ->on('colleges');

            $table->foreign('establishment_city_id')
            ->references('id')
            ->on('cities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
