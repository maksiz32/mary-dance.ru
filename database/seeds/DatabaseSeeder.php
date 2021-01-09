<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run()
    {
        $this->call('ContentTableSeeder');
        $this->command->info('operation Content completed successfully!');
    }
}
