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
        Schema::create('lab_ghosts', function (Blueprint $table) {
            $table->string('lab_id',100);
            $table->string('ghost_id',100);
            $table->datetime('assigned_at');
            $table->boolean('is_active');
            $table->timestamps();

            $table->primary(['lab_id', 'ghost_id']);
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
            $table->foreign('ghost_id')->references('id')->on('ghosts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lab_ghosts');
    }
};
