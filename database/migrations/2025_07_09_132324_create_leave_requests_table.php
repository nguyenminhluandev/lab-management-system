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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('schedule_id');
            $table->string('teacher_id');
            $table->datetime('leave_date');
            $table->datetime('makeup_date');
            $table->text('reason');
            $table->enum('status', ['Chờ duyệt', 'Đã duyệt', 'Từ chối'])->default('Chờ duyệt');
            $table->text('reason_rejection')->nullable();
            $table->string('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();

            $table->timestamps();

            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leave_requests');
    }
};
