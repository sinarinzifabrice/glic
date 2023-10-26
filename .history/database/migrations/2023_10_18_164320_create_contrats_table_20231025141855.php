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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->date('datedebut');
            $table->date('datefin');
            $table->boolean('approuve');
            $table->timestamps();

            $table->unsignedBigInteger('bien')->nullable();
            $table->foreign('bien')->references('id')->on('biens');

            $table->unsignedBigInteger('locataire')->nullable();
            $table->foreign('locataire')->references('id')->on('locataires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
