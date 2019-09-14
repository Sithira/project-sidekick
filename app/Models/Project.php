<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $name
 * @property string $type
 * @property float|null $budget
 * @property string $end_date
 * @property string $expires_in
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectDocument[] $documents
 * @property-read \App\Models\User $employee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectStatus[] $statuses
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereExpiresIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'proposal_id',
        'name',
        'description',
        'type',
        'budget',
        'accepted_on',
        'expires_in',
        'end_date',
        'reference'
    ];

    /**
     * Get project owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get working employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(User::class)
            ->where('employee_id');
    }

    /**
     * Get required skills for the project, set by the owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this
            ->belongsToMany(Skill::class, 'project_skills', 'skill_id', 'project_id');
    }

    /**
     * Get all the documents that the project has
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(ProjectDocument::class);
    }

    /**
     * Proposals
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proposals()
    {
        return $this->hasMany(ProjectProposal::class);
    }
}
