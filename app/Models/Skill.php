<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    /**
     * Get all the users for the skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this
            ->belongsToMany(User::class, 'user_skills', 'user_id', 'skill_id');
    }

    /**
     * Get the projects for a skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this
            ->belongsToMany(Project::class, 'project_skills', 'project_id', 'skill_id');
    }
}
