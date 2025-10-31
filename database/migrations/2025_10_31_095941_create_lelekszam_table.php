<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lelekszam', function (Blueprint $table) {
            $table->id(); // auto-increment csak itt
            $table->unsignedBigInteger('varosid');
            $table->year('ev');
            $table->integer('no');
            $table->integer('osszesen');
            $table->timestamps();

            $table->foreign('varosid')->references('id')->on('varos');
            $table->unique(['varosid', 'ev']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lelekszam');
    }
};