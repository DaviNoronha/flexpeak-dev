<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerfilSeeder::class);
        $this->call(TipoBugSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BugSeeder::class);
        $this->call(ImagemSeeder::class);
    }
}
