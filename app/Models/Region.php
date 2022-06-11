<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static select(string[] $array)
 */
class Region extends Model
{
    use HasFactory;

    protected $table = "regions";
    /**
     * @return HasMany
     */
    public function districts(): HasMany {
        return $this->hasMany(Districts::class, 'region_id', 'id');
    }
}
