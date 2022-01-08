<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chats = [
            ['name' => 'Спорт чат', 'description' => 'Чат для тру спортсменов'],
            ['name' => 'Алко чат',  'description' => 'Чат для просто потянуть мартини'],
        ];

        foreach ($chats as $chat) {
            Chat::create($chat);
        }
    }
}
