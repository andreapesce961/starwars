<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeopleTable extends Migration
{
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->unsignedBigInteger('homeworld_id')->nullable();
            $table->foreign('homeworld_id', 'homeworld_fk_6525486')->references('id')->on('planets');
        });
    }
}
