<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::updateOrCreate([
    		'email'			=> 'hairulanam21@gmail.com',
    	], [
    		'password'		=> bcrypt('anamanamkun'),
    		'nama'			=> 'Hairul Anam',
    		'hobi'			=> 'Makan, Rebahan dan main game',
    		'kota_lahir'	=> 'Jember',
    		'tanggal_lahir'	=> '1998-04-08',
    		'api_token'		=> bcrypt(\Str::random(50)),
    	]);
    	foreach (range(1, 5) as $ke) {
    		User::updateOrCreate([
    			'email'			=> 'demo'.$ke.'@sipempel.com',
    		], [
    			'password'		=> bcrypt('demo'.$ke),
    			'nama'			=> 'Ini Hanya Demo',
    			'hobi'			=> 'Makan, Rebahan dan main game',
    			'kota_lahir'	=> 'Wakanda Forever',
    			'tanggal_lahir'	=> '1998-0'.$ke.'-1'.$ke,
    			'api_token'		=> bcrypt(\Str::random(50)),
    		]);
    	}
    }
}
