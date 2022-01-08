<?php

namespace App\Repository;

use App\Enums\CategoryType;
use App\Helpers\ValidatedModel;
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
        return Category::where('name', $name)->where('type', CategoryType::Main->value)->exists();
    }

    public function store(ValidatedModel $fields): Category
    {
        return Category::create($fields->getArray());
    }

    public function update(Category $category, ValidatedModel $fields): bool
    {
        return $category->update($fields->getArray());
    }

    public function getAllRegionalByRegion(int $id): Collection
    {
        return Category::where('region_id', $id)->get();
    }

    public function getAllMain(): Collection
    {
        return Category::where('type', CategoryType::Main->value)->get();
    }

    public function delete(Category $category): ?bool
    {
        return $category->delete();
    }

    public function get(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function checkSameCategoryInRegionExists(Category $category, object $fields)
    {
        return Category::where('region_id', $category->region_id)
            ->where(function ($query) use ($fields) {
                $query->orWhere('name', $fields->name)
                    ->orWhere('description', $fields->description);
        })
            ->where('id', '!=', $category->id)
            ->exists();
    }
}
