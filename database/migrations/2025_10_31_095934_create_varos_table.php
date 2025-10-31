<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('varos', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nev');
            $table->unsignedBigInteger('megyeid');
            $table->tinyInteger('megyeszekhely')->default(0);
            $table->tinyInteger('megyeijogu')->default(0);
            $table->timestamps();

            $table->foreign('megyeid')->references('id')->on('megye');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('varos');
    }
};