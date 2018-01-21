<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiversitySponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diversity_sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_company');
            $table->string('contact_twitter');
            $table->string('ticket_amount');
            $table->string('contact_reason');
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
        Schema::dropIfExists('diversity_sponsors');
    }
}
