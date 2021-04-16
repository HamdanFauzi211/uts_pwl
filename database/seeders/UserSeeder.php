<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'name' => 'HamdanFauzi',
           'email' => 'hamdanfauzi281@gmail.com',
           'password' => Hash::make('polinema123')
       ]);
    }
}
