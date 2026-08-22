<?php

namespace App\Enums;

enum MemberInvitationStatus: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case EXPIRED = 'expired';
    case CANCELLED = 'cancelled';
}
