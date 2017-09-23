<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNashvilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nashville', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity');
            $table->string('topic');
            $table->string('website');
            $table->string('yelp_link');
            $table->string('google_link');
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
        Schema::dropIfExists('nashville');
    }
}
