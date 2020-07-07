<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = new \App\Model\Level();
        $level->name = 'Level-1';
        $level->save();
    }
}
