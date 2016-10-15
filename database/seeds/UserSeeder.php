<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Model::unguard();
        DB::table('users')->delete();
        DB::table('users')->insert(
                    [
                        [
                            'id'            => 1,
                            'name'          => 'Admin',
                            'email'         => 'admin@admin.com',
                            'password'      => Hash::make('senhaAdmin'),
                            'created_at'    => date('Y-m-d H:m:s'),
                            'updated_at'    => date('Y-m-d H:m:s'),
                        ],
                    ]);
        $this->command->info('User table seeded!');

	}

}
