<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserQualification
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserQualification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserQualification extends Model
{

    protected $fillable = ['title', 'description', 'user_id'];

    /**
     * Get the user belong to the user qualification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
