<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 50; $i++) { 
        DB::table('events')->insert([
                # code...
                'name' => Str::random(10),
                ]);
            }
    }
}
