<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSponsorsLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('sponsor_levels')->insert([
            'name' => 'In Kind',
            'cost' => 0,
            'remaining' => 0,
            'information' => 'Southeast PHP Conference could not happen without the support of these sponsors in our local community.'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsor_levels', function (Blueprint $table) {
            //
        });
    }
}
