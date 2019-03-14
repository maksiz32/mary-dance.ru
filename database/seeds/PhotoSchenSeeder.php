<?php
use App\PhotoSchen;
use Illuminate\Database\Seeder;

class PhotoSchenSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        PhotoSchen::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(PhotoSchen::class, 50)->create();
    }
}
