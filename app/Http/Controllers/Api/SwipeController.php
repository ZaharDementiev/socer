<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\DataExistsException;
use App\Exceptions\WrongDataException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Swipe\StoreChatToUserRequest;
use App\Http\Requests\Swipe\StoreUserToChatRequest;
use App\Http\Requests\Swipe\StoreUserToUserRequest;
use App\Models\Chat;
use App\Models\Swipe;
use App\Models\User;
use App\Repository\SwipeRepository;
use App\Services\SwipeService;
use App\Http\Resources\SwipeResource;

class SwipeController extends Controller
{
    public function __construct(
        private SwipeService $swipeService,
        private SwipeRepository $swipeRepository,
    ) {}

    /**
     * @throws WrongDataException
     * @throws DataExistsException
     */
    public function storeUserToUser(StoreUserToUserRequest $request): SwipeResource
    {
        return $this->swipeService->swipeUserToUser($request->validated());
    }

    /**
     * @throws WrongDataException
     * @throws DataExistsException
     */
    public function storeUserToChat(StoreUserToChatRequest $request): SwipeResource
    {
        return $this->swipeService->swipeUserToChat($request->validated());
    }

    /**
     * @throws WrongDataException
     * @throws DataExistsException
     */
    public function storeChatToUser(StoreChatToUserRequest $request): SwipeResource
    {
        return $this->swipeService->swipeChatToUser($request->validated());
    }

    ///TODO: заменить на auth()->id()
    public function deleteAllUserToUser(): bool
    {
        $userId = 1;
        return $this->swipeRepository->delete($userId, User::class, User::class);
    }

    ///TODO: заменить на auth()->id()
    public function deleteAllChatToUser(): bool
    {
        $userId = 1;
        return $this->swipeRepository->delete($userId, User::class, Chat::class);
    }

    ///TODO: заменить на auth()->id()
    public function deleteAllUserToChat(): bool
    {
        $userId = 1;
        return $this->swipeRepository->delete($userId, Chat::class, User::class);
    }
}
