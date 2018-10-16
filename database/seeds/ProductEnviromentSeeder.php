<?php

use Illuminate\Database\Seeder;

class ProductEnviromentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'Admin',
                'password' =>bcrypt('admin@123') ,
                'email' =>'cclt040028@gmail.com',
                'is_admin' => 1,
        ]);
    }
}
