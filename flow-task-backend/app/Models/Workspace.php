<?php

namespace App\Models;

use App\Enums\WorkspaceStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'owner_user_id',
    'name',
    'slug',
    'bio',
    'logo',
    'is_public',
    'status',
])]
class Workspace extends Model
{
    use SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => WorkspaceStatus::class,
            'is_public' => 'boolean',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function settings(): HasOne
    {
        return $this->hasOne(WorkspaceSetting::class, 'workspace_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(WorkspaceMember::class, 'workspace_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'workspace_members', 'workspace_id', 'user_id')->withPivot([
            'role_id',
            'invited_by_user_id',
            'joined_at',
        ]);
    }

    public function memberInvitations(): HasMany
    {
        return $this->hasMany(MemberInvitation::class, 'workspace_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'workspace_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'workspace_id');
    }
}
