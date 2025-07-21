<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->string('lab_id');
            $table->string('subject_id');
            $table->string('teacher_id');
            $table->integer('semester_id');

            $table->integer('day_of_week'); //2-7
            $table->integer('start_period'); //1-15
            $table->integer('total_periods'); //1-5

            $table->timestamps();

            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('restrict');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('restrict');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedules');
    }
};
