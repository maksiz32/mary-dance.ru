<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Our_dog;

class OurDogTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Our_dog::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(Our_dog::class, 14)->create();

    }
}
