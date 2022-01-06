<?php

namespace App\Services;

use App\Http\Resources\SwipeResource;
use App\Models\Chat;
use App\Models\User;
use App\Repository\ChatRepository;
use App\Repository\SwipeRepository;
use App\Repository\UserRepository;

class SwipeService
{
    public function __construct(
        private SwipeRepository $swipeRepository,
        private UserRepository  $userRepository,
        private ChatRepository  $chatRepository,
    ) {}

    public function swipe(array $fields): ?SwipeResource
    {
        $status = true;

        if ($this->swipeRepository->swipeExists($fields)) {
            return null;
        }

        if ($fields['swiper_type'] == User::class && $fields['swiped_type'] == User::class) {
            $status = $this->userToUser($fields['swiper_id'], $fields['swiped_id']);
        } elseif ($fields['swiper_type'] == User::class && $fields['swiped_type'] == Chat::class) {
            $status = $this->userToChat($fields['swiper_id'], $fields['swiped_id']);
        } elseif ($fields['swiper_type'] == Chat::class && $fields['swiped_type'] == User::class) {
            $status = $this->chatToUser($fields['swiper_id'], $fields['swiped_id']);
        }

        if (!$status) {
            return null;
        }

        return new SwipeResource($this->swipeRepository->store($fields));
    }

    private function userToUser(int $swiperId, int $swipedId): bool
    {
        if ($swipedId == $swiperId || !$this->userRepository->checkUserExists($swipedId)) {
            return false;
        }

        return true;
    }

    private function userToChat(int $swiperId, int $swipedId): bool
    {
        $swiperUser = $this->userRepository->getUserById($swiperId);
        $swipedChat = $this->chatRepository->get($swipedId);

//        if (!$swipedChat || !$swiperUser->chats) {
//            return false;
//        }

        ///TODO: Если среди чатов юзера есть $swipedChat -> return false

        return true;
    }

    private function chatToUser(int $swiperId, int $swipedId): bool
    {
        $chat = $this->chatRepository->get($swiperId);
        $swipedUser = $this->userRepository->getUserById($swipedId);

        if (!$chat) {
            return false;
        }

        ///TODO: Если среди участников чата есть $swipedUser -> return false

        return true;
    }
}
