<?php
use Illuminate\Database\Seeder;
use App\Litter;

class LitterTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Litter::truncate();
        DB::statement("SET foreign_key_checks=1");
        factory(Litter::class, 10)->create();
    }
}
