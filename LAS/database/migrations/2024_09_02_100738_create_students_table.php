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
            $table->string('roepnaam', 45);
            $table->string('tussenvoegsel', 45);
            $table->string('achternaam', 45);
            $table->string('voorletters', 45);
            $table->string('officielenaam', 45);
            $table->string('postcode', 12);
            $table->string('straat', 145);
            $table->integer('huisnummer');
            $table->string('toevoeging', 45);
            $table->string('woonplaats', 45);
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
