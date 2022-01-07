<?php

namespace App\Services;

use App\Exceptions\DataExistsException;
use App\Http\Resources\CategoryResource;
use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository,
    ) {}

    /**
     * @throws DataExistsException
     */
    public function store(array $fields): CategoryResource
    {
        if ((!empty($fields['region_id']) && $this->categoryRepository->checkCategoryInRegionExists($fields['name'], $fields['region_id'])) ||
            empty($fields['region_id']) && $this->categoryRepository->checkMainCategoryExists($fields['name'])
        ) {
            throw new DataExistsException();
        }

        return new CategoryResource($this->categoryRepository->store($fields));
    }
}
