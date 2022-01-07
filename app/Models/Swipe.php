<?php

namespace App\Models;

use App\Enums\SwipeValue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\DB;

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

    public function swiperUser(): object
    {
        return DB::table('users')->where('id', $this->swiper_id)->first();
    }

    public function swipedUser(): object
    {
        return DB::table('users')->where('id', $this->swiped_id)->first();
    }

    public function swipedChat(): object
    {
        return DB::table('chats')->where('id', $this->swiped_id)->first();
    }
}
