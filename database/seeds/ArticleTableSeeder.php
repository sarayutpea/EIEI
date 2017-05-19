<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Faker\Factory as Faker;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=20;$i++){
        	$faker = Faker::create();
	        DB::table('articles')->insert([
	        	'title' => $faker->sentence,
	        	'body' => $faker->paragraph(2),
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now()
	    	]);	
        }
        
    }
}
