<?php

use App\Models\Sponsor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->integer('front_page')->after('sponsor_level')->default('1');
        });

        $sponsor = Sponsor::find(22);

        if (!$sponsor) {
            return;
        }

        $sponsor->setFrontPage(0);
        $sponsor->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
