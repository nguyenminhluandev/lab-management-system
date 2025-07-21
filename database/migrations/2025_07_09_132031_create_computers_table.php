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
       Schema::create('computers', function (Blueprint $table) {
            $table->string('id')->primary(); // Mã máy tính
            $table->string('name');
            $table->string('lab_id');
            $table->string('cpu')->nullable();     // CPU
            $table->string('ram')->nullable();     // RAM
            $table->string('storage')->nullable(); // Ổ cứng
            $table->enum('status', ['Hoạt động', 'Hỏng'])->default('Hoạt động');
            $table->timestamps();

            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('computers');
    }
};
