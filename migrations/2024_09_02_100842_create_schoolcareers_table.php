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
        Schema::create('schoolcareers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cursusjaar_id')->unsigned();
            $table->foreign('cursusjaar_id')->references('id')->on('cursusjaars');
            
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('schoolclasses');

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
