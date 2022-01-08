<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTable::class);
        $this->call(ChatsTable::class);
        $this->call(RegionsTable::class);
        $this->call(CategoriesTable::class);
        $this->call(CategoryVotingsTable::class);
    }
}
