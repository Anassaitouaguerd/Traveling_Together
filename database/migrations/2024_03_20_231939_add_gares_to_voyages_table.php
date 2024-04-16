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
        Schema::table('voyages', function (Blueprint $table) {
            $table->unsignedBigInteger('gare_depart');
            $table->unsignedBigInteger('gare_arrivee');
            $table->dateTime('date_depart');
            $table->dateTime('date_arrivee');
            $table->timestamps();
            $table->foreign('gare_depart')->references('id')->on('gares')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gare_arrivee')->references('id')->on('gares')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voyages', function (Blueprint $table) {
            //
        });
    }
};
