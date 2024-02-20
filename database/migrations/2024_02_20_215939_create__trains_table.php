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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('voyage_id');
            $table->unsignedBigInteger('gare_id');
            $table->foreign('voyage_id')->references('id')->on('voyages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gare_id')->references('id')->on('gares')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};