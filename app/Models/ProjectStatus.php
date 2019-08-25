<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    /**
     * Get the project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
