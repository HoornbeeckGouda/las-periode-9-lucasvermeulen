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
        Schema::create('opleidingvaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vak_id')->unsigned();
            $table->foreign('vak_id')->references('id')->on('vaks');
            
            $table->bigInteger('opleiding_id')->unsigned();
            $table->foreign('opleiding_id')->references('id')->on('opleidings');

            $table->string('opleidingVakcol', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opleidingvaks');
    }
};
