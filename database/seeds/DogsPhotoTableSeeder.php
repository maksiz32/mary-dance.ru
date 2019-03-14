<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Dogs_photo;

class DogsPhotoTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Dogs_photo::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(Dogs_photo::class, 30)->create();
    }
}
