<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schoolloopbaans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cursusjaar_id')->unsigned();
            $table->foreign('cursusjaar_id')->references('id')->on('cursusjaars');
            
            $table->bigInteger('opleiding_id')->unsigned();
            $table->foreign('opleiding_id')->references('id')->on('opleidings');

            $table->bigInteger('klas_id')->unsigned();
            $table->foreign('klas_id')->references('id')->on('klas');

            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->dateTime('begindatum');
            $table->dateTime('einddatum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolloopbaans');
    }
};
