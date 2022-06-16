<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('continent_code',50)->nullable();
            $table->string('currency_code',50)->nullable();
            $table->string('iso2_code',50)->nullable();
            $table->string('iso3_code',50)->nullable();
            $table->string('iso_numeric_code',100)->nullable();
            $table->string('fips_code',50)->nullable();
            $table->string('calling_code',50)->nullable();
            $table->string('common_name',100)->nullable();
            $table->string('official_name',100)->nullable();
            $table->string('endonym',100)->nullable();
            $table->string('demonym',100)->nullable();
            $table->integer('is_active')->default(1); // 1 For active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
