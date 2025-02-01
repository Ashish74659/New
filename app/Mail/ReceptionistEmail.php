<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailLog;

class ReceptionistEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailLog;

    public function __construct($recipientEmail)
    {
        $this->emailLog = EmailLog::create(['email' => $recipientEmail, 'status' => 'pending']);
    }

    public function build()
    {
        return $this->markdown('email_test')
                    ->with(['trackingUrl' => url('email/track/' . $this->emailLog->id)]);
    }
}


