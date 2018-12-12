<?php

use Illuminate\Database\Seeder;

class PWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 5; $x++) {
        DB::table('Pws')->insert([
            'Title' => str_random(10),
            'Text' => str_random(10),
        ]);}

    }
}
