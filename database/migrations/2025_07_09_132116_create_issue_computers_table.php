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
        Schema::create('issue_computers', function (Blueprint $table) {
            $table->integer('issue_id');
            $table->string('computer_id');
            $table->timestamps();

            $table->primary(['issue_id', 'computer_id']);
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issue_computers');
    }
};
