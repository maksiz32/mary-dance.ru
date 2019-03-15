<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run()
    {
        $this->call('LitterTableSeeder');
        $this->command->info('operation Litter completed successfully!');
        $this->call('ContentTableSeeder');
        $this->command->info('operation Content completed successfully!');
        $this->call('OurDogTableSeeder');
        $this->command->info('operation OurDog completed successfully!');
        $this->call('DogsPhotoTableSeeder');
        $this->command->info('operation DogsPhoto completed successfully!');
        $this->call('PhotoSchenSeeder');
        $this->command->info('operation PhotoSchen completed successfully!');
        $this->call('OurNewsTableSeeder');
        $this->command->info('operation OurNews completed successfully!');
        $this->call('UserTableSeeder');
        $this->command->info('operation User completed successfully!');
    }
}
