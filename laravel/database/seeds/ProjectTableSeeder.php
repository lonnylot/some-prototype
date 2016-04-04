<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
        	'name' => 'Bond',
        	'url' => 'https://www.hellobond.com',
        	'image_path' => 'assets/img/bond-splash.jpg'
        ]);

        DB::table('projects')->insert([
        	'name' => 'Bundoo',
        	'url' => 'https://www.bundoo.com',
        	'image_path' => 'assets/img/bundoo-splash.png'
        ]);

        DB::table('projects')->insert([
        	'name' => 'Brownstoner',
        	'url' => 'http://marketplace.brownstoner.com',
        	'image_path' => 'assets/img/brownstoner-splash.jpg'
        ]);
    }
}
