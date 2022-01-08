<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CategoryVoting
 *
 * @property int        $id
 * @property int        $category_id
 * @property int        $current_votes
 * @property int        $needed_votes
 * @property Carbon     $deadline
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 */

class CategoryVoting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const VOTING_TIME = 3;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
