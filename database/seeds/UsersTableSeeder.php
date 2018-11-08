<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Reginaldo',
            'last_name' => 'Junior',
            'email' => 'reginaldo.junior696@gmail.com',
            'password' => bcrypt(16119900)
        ]);
        \App\User::create([
            'name' => 'Adriana',
            'last_name' => 'Diniz',
            'email' => 'adriana.diniz@rbj.com',
            'password' => bcrypt('mudar123')
        ]);


    }
}
