<?php

namespace App\Models;

use App\Enums\UserStatus;
use App\Mail\QueuedResetPasswordEmail;
use App\Mail\QueuedVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable([
    'username',
    'email',
    'email_verified_at',
    'password',
    'status',
    'first_name',
    'last_name',
    'phone',
    'phone_verified_at',
    'avatar',
    'last_login_at'
])]

#[Hidden([
    'password',
    'remember_token'
])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class
        ];
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new QueuedVerifyEmail());
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new QueuedResetPasswordEmail($token));
    }

    public function ownedWorkspaces(): HasMany
    {
        return $this->hasMany(Workspace::class, 'owner_id');
    }

    public function workspaceMemberships(): HasMany
    {
        return $this->hasMany(WorkspaceMember::class);
    }

    public function sentWorkspaceInvitations(): HasMany
    {
        return $this->hasMany(WorkspaceInvitation::class, 'invited_by');
    }
}
