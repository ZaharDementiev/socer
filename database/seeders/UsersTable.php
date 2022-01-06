<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Zahar', 'surname' => 'Dementiev',   'username' => 'ZD', 'phone' => '380980841385', 'email' => 'zahardementiev@gmail.com',   'password' => Hash::make('123045607890z')],
            ['name' => 'Yurii', 'surname' => 'Kulaxyz',     'username' => 'YK', 'phone' => '380980841386', 'email' => 'yuriikulaxyz@gmail.com',     'password' => Hash::make('123045607890z')]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
