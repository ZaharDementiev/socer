<?php

namespace App\Models;

use App\Enums\SwipeValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Swipe
 *
 * @property int        $id
 * @property string     $swiper_type
 * @property int        $swiper_id
 * @property string     $swiped_type
 * @property int        $swiped_id
 * @property SwipeValue $value
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 */

class Swipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function swipeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function swiperUser(): ?User
    {
        return User::where('id', $this->swiper_id)->first();
    }

    public function swipedUser(): ?User
    {
        return User::where('id', $this->swiped_id)->first();
    }

    public function swiperChat(): ?Chat
    {
        return Chat::where('id', $this->swiper_id)->first();
    }

    public function swipedChat(): ?Chat
    {
        return Chat::where('id', $this->swiped_id)->first();
    }
}
