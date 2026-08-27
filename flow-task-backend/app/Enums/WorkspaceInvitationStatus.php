<?php

namespace App\Enums;

enum WorkspaceInvitationStatus: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case EXPIRED = 'expired';
    case CANCELLED = 'cancelled';
}
