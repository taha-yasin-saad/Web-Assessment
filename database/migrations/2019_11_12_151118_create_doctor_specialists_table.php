<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('pain_type_id');
            // $table->foreign('pain_type_id')->references('id')->on('pain_types')->onDelete('cascade');
            $table->unsignedInteger('doctor_id');
            // $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_specialists');
    }
}
