<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('capital')->nullable();
            $table->string('region');
            $table->string('currency')->nullable();
            $table->string('language')->nullable();
            $table->bigInteger('population')->nullable();

            $table->decimal('latitude',10,6)->nullable();
            $table->decimal('longitude',10,6)->nullable();

            $table->string('flag')->nullable();

            $table->integer('risk_score')->default(0);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};