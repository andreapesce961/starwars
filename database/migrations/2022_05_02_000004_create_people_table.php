<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('birth_year')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('gender')->nullable();
            $table->string('hair_color')->nullable();
            $table->integer('height')->nullable();
            $table->integer('mass')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('url');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
