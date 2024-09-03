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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->string('initials', 45);
            $table->string('officielename', 45);
            $table->string('postcode', 12);
            $table->string('streat', 145);
            $table->integer('housenumber');
            $table->string('addition', 45);
            $table->string('city', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
