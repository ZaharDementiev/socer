<?php

namespace App\Services;

use App\Enums\CategoryType;
use App\Exceptions\DataExistsException;
use App\Exceptions\UpdateException;
use App\Exceptions\WrongDataException;
use App\Helpers\ValidatedModel;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryVotingResource;
use App\Models\Category;
use App\Models\CategoryVoting;
use App\Repository\Category\CategoryRepository;
use App\Repository\Category\CategoryVotingRepository;
use Carbon\Carbon;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private CategoryVotingRepository $categoryVotingRepository,
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

    public function saveVoting(Category $category)
    {
        if ($voting = $this->categoryVotingRepository->getByCategory($category)) {
            return new CategoryVotingResource($voting);
        }

        ///TODO: считать кол-во голосов и дедлайн для региона
        $neededVotes = 100;
        $deadline = Carbon::now()->addDays(CategoryVoting::VOTING_TIME * 1);

        $data = [
            'category_id'   => $category->id,
            'needed_votes'  => $neededVotes,
            'deadline'      => $deadline,
        ];

        return new CategoryVotingResource($this->categoryVotingRepository->store($data));
    }
}
