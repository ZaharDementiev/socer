<?php

namespace App\Models;

use App\Enums\CategoryType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Category
 *
 * @property int            $id
 * @property string         $name
 * @property string         $description
 * @property CategoryType   $type
 * @property int            $region_id
 * @property Carbon         $created_at
 * @property Carbon         $updated_at
 */

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function region(): ?HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
