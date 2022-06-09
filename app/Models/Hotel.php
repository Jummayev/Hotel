<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, mixed $id)
 * @method static create(array $array)
 */
class Hotel extends Model
{
    use HasFactory;

    protected $table = "hotels";

    protected $fillable = [
        'user_id',
        'region',
        'phoneNumber',
        'county',
        'venueAddress',
        'name',
        'type',
        'roomCount',
        'email',
        'amount',
        'images'
    ];
    protected $casts = ['images' => 'array'];

    /** user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
