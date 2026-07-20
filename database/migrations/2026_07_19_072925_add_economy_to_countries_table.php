<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->decimal('gdp', 15, 2)->nullable();
            $table->integer('gdp_year')->nullable();
            $table->decimal('gdp_growth', 8, 2)->nullable();

        });
    }


    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->dropColumn([
                'gdp',
                'gdp_year',
                'gdp_growth'
            ]);

        });
    }
};