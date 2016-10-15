<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AclGroupSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('acl_groups')->delete();
        DB::table('acl_groups')->insert
        (
            [
                ["id"           => 1,
                 "name"         => "SuperAdmin",
                 "description"  =>  "Super administrador do sistema",
                 "created_at"   =>  date('y-m-d H:m:s'),
                ],
        ]

        );
        $this->command->info('Acl_Groups table seeded!');

    }

}
