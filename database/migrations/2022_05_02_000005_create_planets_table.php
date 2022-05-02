<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('diameter')->nullable();
            $table->integer('rotation_period')->nullable();
            $table->integer('orbital_period')->nullable();
            $table->float('gravity', 3, 2)->nullable();
            $table->integer('population')->nullable();
            $table->string('climate')->nullable();
            $table->string('terrain')->nullable();
            $table->integer('surface_water')->nullable();
            $table->string('url');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
