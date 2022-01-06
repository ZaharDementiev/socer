<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class SwipeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStoreUserToUser()
    {
        $data = [
            'swiper_id' =>  1,
            'swiped_id' =>  2,
            'value' =>  1,
        ];
        $response = $this->post(route('swipe.user.user'), $data);

        $this->assertEquals(201, $response->status());
    }

    public function testDuplicateStoreUserToUser()
    {
        $data = [
            'swiper_id' =>  1,
            'swiped_id' =>  2,
            'value'     =>  1,
        ];
        $response = $this->post(route('swipe.user.user'), $data);

        $this->assertEquals(200, $response->status());
    }

    public function testDeleteAllUserToUser()
    {
        $data = [
            'swiper_type'   => User::class,
            'swiper_id'     => 1,
        ];

        $response = $this->get(route('swipe.user.user.delete'), $data);

        $this->assertEquals(200, $response->status());
    }

    public function testStoreUserToChat()
    {
        $data = [
            'swiper_id' =>  1,
            'swiped_id' =>  1,
            'value' =>  1,
        ];
        $response = $this->post(route('swipe.user.chat'), $data);

        $this->assertEquals(201, $response->status());
    }

    public function testDeleteAllChatToUser()
    {
        $data = [
            'swiper_type'   => User::class,
            'swiper_id'     => 1,
        ];

        $response = $this->get(route('swipe.user.chat.delete'), $data);

        $this->assertEquals(200, $response->status());
    }

    public function testStoreChatToUser()
    {
        $data = [
            'swiper_id' =>  1,
            'swiped_id' =>  1,
            'value' =>  1,
        ];
        $response = $this->post(route('swipe.chat.user'), $data);

        $this->assertEquals(201, $response->status());
    }

    public function testDeleteAllUserToChat()
    {
        $data = [
            'swiper_type'   => User::class,
            'swiper_id'     => 1,
        ];

        $response = $this->get(route('swipe.chat.user.delete'), $data);

        $this->assertEquals(200, $response->status());
    }
}
