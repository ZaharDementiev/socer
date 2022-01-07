<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\DataExistsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest as CategoryStoreRequest;
use App\Models\Category;
use App\Models\Region;
use App\Repository\CategoryRepository;
use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService     $categoryService,
        private CategoryRepository  $categoryRepository,
    ) {}

    /**
     * @throws DataExistsException
     */
    public function store(CategoryStoreRequest $request): CategoryResource
    {
        return $this->categoryService->store($request->validated());
    }

    public function allRegionals(Region $region): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->categoryRepository->getAllRegionalByRegion($region->id));
    }

    public function allMain(): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->categoryRepository->getAllMain());
    }

    public function destroy(Category $category): ?bool
    {
        return $this->categoryRepository->delete($category);
    }
}
