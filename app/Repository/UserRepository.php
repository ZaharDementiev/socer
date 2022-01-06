<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function checkUserExists(int $id): bool
    {
        return User::where('id', $id)->exists();
    }

    public function getUserById(int $id): ?User
    {
        return User::find($id);
    }
}
