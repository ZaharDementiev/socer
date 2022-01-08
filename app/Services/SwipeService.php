<?php

namespace App\Services;

use App\Exceptions\WrongDataException;
use App\Helpers\ValidatedModel;
use App\Http\Resources\SwipeResource;
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

    /**
     * @throws WrongDataException
     */
    public function swipeUserToUser(ValidatedModel $validatedModel): SwipeResource
    {
        $fields = $validatedModel->getObject();

        if ($fields->swiper_id == $fields->swiped_id ||
            !$this->userRepository->checkUserExists($fields->swiped_id)
        ) {
            throw new WrongDataException();
        }

        return new SwipeResource($this->swipeRepository->store($validatedModel));
    }

    /**
     * @throws WrongDataException
     */
    public function swipeUserToChat(ValidatedModel $validatedModel): SwipeResource
    {
        $fields = $validatedModel->getObject();

        $swiperUser = $this->userRepository->getUserById($fields->swiper_id);
        $swipedChat = $this->chatRepository->get($fields->swiped_id);

//        if (!$swipedChat || !$swiperUser->chats) {
//            throw new WrongDataException();
//        }

        ///TODO: Если среди чатов юзера есть $swipedChat -> return false

        return new SwipeResource($this->swipeRepository->store($validatedModel));
    }

    /**
     * @throws WrongDataException
     */
    public function swipeChatToUser(ValidatedModel $validatedModel): SwipeResource
    {
        $fields = $validatedModel->getObject();

        $chat = $this->chatRepository->get($fields->swiper_id);
        $swipedUser = $this->userRepository->getUserById($fields->swiped_id);

        if (!$chat) {
            throw new WrongDataException();
        }

        ///TODO: Если среди участников чата есть $swipedUser -> return false

        return new SwipeResource($this->swipeRepository->store($validatedModel));
    }
}
