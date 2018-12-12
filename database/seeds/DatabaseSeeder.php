<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@techrex.com',
            'password' => bcrypt('123456'),
            'role'=>'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'User@techrex.com',
            'password' => bcrypt('123456'),
        ]);


        // PW note: use for add test user
        for ($x = 0; $x <= 5; $x++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
            ]);}

        for ($x = 0; $x <= 5; $x++) {
            DB::table('PWs')->insert([
                'Title' => 'Article'.$x,
                'Picfile' => 'fontyslogo.png',
                'Author' => 'User',
                'Text' => 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG',
            ]);}


    }
}
