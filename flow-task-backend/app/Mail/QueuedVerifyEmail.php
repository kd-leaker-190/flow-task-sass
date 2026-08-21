<?php

namespace App\Mail;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class QueuedVerifyEmail extends VerifyEmail implements ShouldQueue
{
    use Queueable, SerializesModels;
}
