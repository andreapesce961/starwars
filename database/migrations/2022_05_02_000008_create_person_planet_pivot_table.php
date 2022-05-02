<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonPlanetPivotTable extends Migration
{
    public function up()
    {
        Schema::create('person_planet', function (Blueprint $table) {
            $table->unsignedBigInteger('planet_id');
            $table->foreign('planet_id', 'planet_id_fk_6525481')->references('id')->on('planets')->onDelete('cascade');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id', 'person_id_fk_6525481')->references('id')->on('people')->onDelete('cascade');
        });
    }
}
