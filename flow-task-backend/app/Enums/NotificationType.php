<?php

namespace App\Enums;

enum NotificationType: string
{
    case APP = 'app';
    case EMAIL = 'email';
    case SMS = 'sms';
}
