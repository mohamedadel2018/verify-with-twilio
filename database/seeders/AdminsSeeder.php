<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'email' =>'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        DB::table('admins')->insert([
            'email' =>'mohamed@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

    }
}
