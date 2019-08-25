<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all user skills
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this
            ->belongsToMany(Skill::class, 'user_skills', 'skill_id', 'user_id');
    }

    /**
     * Get all the projects for a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all user experience
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experience()
    {
        return $this->hasMany(UserExperience::class);
    }

    /**
     * Get all user qualifications
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualifications()
    {
        return $this->hasMany(UserQualification::class);
    }
}
