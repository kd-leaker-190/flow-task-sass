<?php

namespace App\Mail;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class QueuedResetPasswordEmail extends ResetPassword implements ShouldQueue
{
    use Queueable, SerializesModels;
}
