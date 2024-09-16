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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schoolYear_id')->unsigned();
            $table->foreign('schoolYear_id')->references('id')->on('school_years');
            
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');

            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->dateTime('startDate');
            $table->dateTime('endDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
