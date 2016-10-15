<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AclPermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('acl_permissions')->delete();
        DB::table('acl_permissions')->insert
        (
            [
                [
                 "id"           => 1,
                 "ident"        => "/api/user_data",
                 "description"  => "Carrega os dados do usuario logado",
                 "created_at"   => date('y-m-d H:m:s'),
                ],
        ]

        );
        $this->command->info('Acl_Pemissions table seeded!');

    }

}
