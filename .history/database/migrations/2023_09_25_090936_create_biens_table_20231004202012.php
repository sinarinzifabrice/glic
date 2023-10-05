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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->integer('loyer');
            $table->smallInteger('numappartement')->nullable();
            $table->smallInteger('numrue');
            $table->string('nomrue', 50);
            $table->string('quartier', 50);
            $table->string('ville', 20);
            $table->boolean('statut');
            $table->timestamps();

            $table->unsignedBigInteger('typede_bien');
            $table->foreign('typede_bien')->references('id')->on('typede_biens');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
