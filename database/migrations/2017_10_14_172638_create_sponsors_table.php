<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('remaining');
            $table->text('information');
            $table->timestamps();
        });

        Schema::create('sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sponsor_level');
            $table->string('website');
            $table->text('about')->nullable();
            $table->string('image')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
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
        Schema::dropIfExists('sponsors');
        Schema::dropIfExists('sponsor_levels');
    }
}
