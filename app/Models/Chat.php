<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Chat
 *
 * @property int        $id
 * @property string     $name
 * @property string     $description
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 */

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function swipe(): MorphMany
    {
        return $this->morphMany(Swipe::class, 'swipeable');
    }
}
