<?php

use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default users
        factory(SoutheastPhp\User::class, 10)->create();

        // Create Nashville activities
        factory(SoutheastPhp\Models\Nashville::class, 20)->create();
    }
}
