<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run()
    {
        $this->call('LitterTableSeeder');
        $this->command->info('operation completed successfully!');
        $this->call('ContentTableSeeder');
        $this->command->info('operation completed successfully!');

    }
}
