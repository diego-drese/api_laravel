<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OauthClientsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Model::unguard();
        DB::table('oauth_clients')->delete();
        DB::table('oauth_clients')->insert(
            [
                [
                    'id'    =>'GXvOWazQ3lA6YSaFji',
                    'secret'=>'GXvOWazQ3lA.6/YSaFji',
                    'name'  =>'Admin Web Site'
                ],
            ]);

        $this->command->info('oauth_clients seeded!');

    }

}
