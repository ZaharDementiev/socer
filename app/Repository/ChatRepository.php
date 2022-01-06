<?php

namespace App\Repository;

use App\Models\Chat;

class ChatRepository
{
    public function get(int $id): ?Chat
    {
        return Chat::find($id);
    }
}
