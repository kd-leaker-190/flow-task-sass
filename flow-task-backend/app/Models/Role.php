<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'slug',
    'description',
])]
class Role extends Model
{
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function workspaceSettings(): HasMany
    {
        return $this->hasMany(WorkspaceSetting::class, 'default_role_id');
    }

    public function workspaceMembers(): HasMany
    {
        return $this->hasMany(WorkspaceMember::class, 'role_id');
    }

    public function memberInvitationRoles(): HasMany
    {
        return $this->hasMany(MemberInvitation::class, 'role_id');
    }
}
