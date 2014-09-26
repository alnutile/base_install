<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        if(Config::get('database.default') != 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        $this->call('UserTableSeeder');
        $this->call('AppTableSeeder');
        if(Config::get('database.default') != 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }


	}

}
