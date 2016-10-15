<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AclUserGroupSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('acl_user_groups')->delete();
        DB::table('acl_user_groups')->insert
        (
            [
                [
                 "user_id"   => 1,
                 "group_id"  => 1
                ],
        ]

        );
        $this->command->info('Acl_User_Groups table seeded!');

    }

}
