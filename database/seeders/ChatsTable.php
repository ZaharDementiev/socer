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
            ['name' => 'Sport Chat', 'description' => 'Test chat for sportsmen'],
            ['name' => 'Drink chat', 'description' => 'Test chat for alcoholics'],
        ];

        foreach ($chats as $chat) {
            Chat::create($chat);
        }
    }
}
