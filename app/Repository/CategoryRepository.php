<?php

namespace App\Repository;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function checkCategoryInRegionExists(string $name, int $regionId): bool
    {
        return Category::where('name', $name)->where('region_id', $regionId)->exists();
    }

    public function checkMainCategoryExists(string $name): bool
    {
        return Category::where('name', $name)->where('type', CategoryType::Main)->exists();
    }

    public function store(array $fields): Category
    {
        return Category::create($fields);
    }

    public function getAllRegionalByRegion(int $id): Collection
    {
        return Category::where('region_id', $id)->get();
    }

    public function getAllMain(): Collection
    {
        return Category::where('type', CategoryType::Main)->get();
    }

    public function delete(Category $category): ?bool
    {
        return $category->delete();
    }
}
