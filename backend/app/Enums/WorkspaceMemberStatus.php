<?php

namespace App\Enums;

enum WorkspaceMemberStatus: string
{
    case ACTIVE = 'active';
    case REMOVED = 'removed';
}
