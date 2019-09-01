<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserExperience
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserExperience whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserExperience extends Model
{
    /**
     * Get the user belong to the user experience
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
