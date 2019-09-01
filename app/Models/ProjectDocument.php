<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectDocument
 *
 * @property int $id
 * @property int $project_id
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectDocument whereUrl($value)
 * @mixin \Eloquent
 */
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
