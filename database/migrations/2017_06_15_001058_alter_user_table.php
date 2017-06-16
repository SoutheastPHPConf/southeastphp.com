<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('email');
            $table->string('last_name')->after('first_name');
            $table->string('preferred_name')->after('last_name');
            $table->string('city')->after('preferred_name');
            $table->string('company')->after('city');
            $table->string('twitter')->after('company');
            $table->integer('first_conference')->after('twitter');
            $table->text('bio')->after('first_conference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'preferred_name', 'city', 'company', 'twitter', 'first_conference']);
        });
    }
}
