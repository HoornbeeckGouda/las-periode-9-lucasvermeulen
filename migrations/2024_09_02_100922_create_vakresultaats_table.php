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
        Schema::create('vakresultaats', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('schoolloopbaan_id')->unsigned();
            $table->foreign('schoolloopbaan_id')->references('id')->on('schoolloopbaans');

            $table->bigInteger('vak_id')->unsigned();
            $table->foreign('vak_id')->references('id')->on('vaks');

            $table->decimal('resultaat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakresultaats');
    }
};
