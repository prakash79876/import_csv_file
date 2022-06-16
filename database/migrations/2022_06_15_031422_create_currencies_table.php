<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('iso_code',50)->nullable();
            $table->string('iso_numeric_code',50)->nullable();
            $table->string('common_name',100)->nullable();
            $table->string('official_name',100)->nullable();
            $table->string('symbol',100)->nullable();
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
        Schema::dropIfExists('currencies');
    }
}
