<?php

use Illuminate\Database\Seeder;

class KosongkanData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('pemasukan_pengeluaran')->truncate();
        DB::table('masukan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
