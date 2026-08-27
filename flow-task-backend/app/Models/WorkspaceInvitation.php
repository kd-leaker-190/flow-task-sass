<?php

namespace App\Models;

use App\Enums\WorkspaceInvitationStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'workspace_id',
    'invited_by',
    'role_id',
    'email',
    'token',
    'status',
    'expires_at',
    'accepted_at',
    'cancelled_at',
])]
class WorkspaceInvitation extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => WorkspaceInvitationStatus::class,
            'expires_at' => 'datetime',
            'accepted_at' => 'datetime',
            'rejected_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
