<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

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
     * Get project statuses for the project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses() {
        return $this->hasMany(ProjectStatus::class);
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

}
