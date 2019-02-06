<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Content;

class ContentTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Content::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(Content::class, 3)->create();
    }
}
