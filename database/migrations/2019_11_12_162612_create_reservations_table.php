<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('patient_id');
            // $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('pain_type_id');
            // $table->foreign('pain_type_id')->references('id')->on('pain_types')->onDelete('cascade');
            $table->date('appointment')->nullable();
            $table->unsignedInteger('doctor_id')->nullable();
            // $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->comment('0:pending , 1:done , 2:refused_from_patient , 3:refused_from_doctor')->default(0);
            $table->integer('refuse_reason')->comment('1:change the doctor  , 2:reschedule ')->nullable();
            $table->date('suitable_date')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
