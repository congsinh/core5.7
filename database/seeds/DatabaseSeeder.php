<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tableNames as $name) {
            if ($name == 'migrations') {
                continue;
            }
            DB::table($name)->truncate();
        }
        $env = config('app.env', 'production');
        if($env == 'production'){
            $this->call(ProductEnviromentSeeder::class);
        }
        else{
            $this->call(UsersTableSeeder::class);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Model::reguard();
    }
}
