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
            $table->timestamps();
            $table->string("NAME", 1000);
            $table->string("CONTINENT", 1000);
            $table->string("DISH", 1000)->nullable();
            $table->string("DESCRIPTION", 1000)->nullable();
            $table->string("PHOTO", 1000)->nullable();
            $table->string("RECIPE", 1000)->nullable();
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
