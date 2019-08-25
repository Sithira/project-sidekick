<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
