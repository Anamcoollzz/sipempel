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
        $this->call(KosongkanData::class);
        $this->call(UserSeeder::class);
        $this->call(PemasukanPengeluaranSeeder::class);
    }
}
