<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\OurNews;

class OurNewsTableSeeder extends Seeder
{    
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        OurNews::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(OurNews::class, 30)->create();
    }
}
