<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Models\CategoryVoting;
use Carbon\Carbon;

class CategoryVotingRepository
{
    public function store(array $fields): CategoryVoting
    {
        return CategoryVoting::create($fields);
    }

    public function getByCategory(Category $category): ?CategoryVoting
    {
        return CategoryVoting::where('category_id', $category->id)->first();
    }
}
