<?php

namespace App\Services;

use App\Enums\CategoryType;
use App\Exceptions\DataExistsException;
use App\Exceptions\UpdateException;
use App\Exceptions\WrongDataException;
use App\Helpers\ValidatedModel;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository,
    ) {}

    public function store(ValidatedModel $validatedModel): CategoryResource
    {
        $fields = $validatedModel->getObject();
        if ((!empty($fields->region_id) && $this->categoryRepository->checkCategoryInRegionExists($fields->name, $fields->region_id)) ||
            (empty($fields->region_id) && $this->categoryRepository->checkMainCategoryExists($fields->name))
        ) {
            throw new DataExistsException();
        }

        if ((isset($fields->region_id) && $fields->type == CategoryType::Main->value) ||
            (!isset($fields->region_id) && $fields->type == CategoryType::Voted->value)
        ) {
            throw new WrongDataException();
        }

        return new CategoryResource($this->categoryRepository->store($validatedModel));
    }

    public function update(Category $category, ValidatedModel $validatedModel): CategoryResource
    {
        $fields = $validatedModel->getObject();
        if ($this->categoryRepository->checkSameCategoryInRegionExists($category, $fields)) {
            throw new DataExistsException();
        }

        if ($this->categoryRepository->update($category, $validatedModel)) {
            return new CategoryResource($this->categoryRepository->get($category->id));
        }

        throw new UpdateException();
    }
}
