<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    /**
     * Get the project that the doc belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
