<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Region
 *
 * @property int        $id
 * @property string     $name
 */

class Region extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function categories(): Collection
    {
        return Category::where('region_id', $this->id)->get();
    }
}
