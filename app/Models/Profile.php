<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Annotations as OA;

class Profile extends Model
{
    /**
     * @OA\Schema(
     *     schema="Profile",
     *     type="object",
     *     title="Profile",
     *     required={"national_id", "avatar", "birth_date"},
     *     properties={
     *         @OA\Property(property="national_id", type="string", example="1234567890"),
     *         @OA\Property(property="avatar", type="file"),
     *         @OA\Property(property="birth_date", type="date", example="1990-01-01"),
     *     }
     * )
     */

    use HasFactory;

    protected $fillable = [
        'national_id',
        'avatar',
        'birth_date',
        'user_id',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
