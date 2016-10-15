<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AclGroupPermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('acl_group_permissions')->delete();
        DB::table('acl_group_permissions')->insert
        (
            [
                [
                 "group_id"      => 1,
                 "permission_id" => 1,
                ],
        ]

        );
        $this->command->info('Acl_Group_Pemissions table seeded!');

    }

}
