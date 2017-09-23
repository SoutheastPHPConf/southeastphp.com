<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNashvilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nashville', function (Blueprint $table) {
            $table->string('description')->after('activity')->nullable();
            $table->string('google_map')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nashville', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('google_map');
        });
    }
}
