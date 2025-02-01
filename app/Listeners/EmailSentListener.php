<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use App\Models\EmailLog;

class EmailSentListener
{
    public function handle(MessageSent $event)
    {
        $recipient = ($event->message->getTo())[0];
        $recipientEmail = $recipient->getAddress();

        EmailLog::where('email',$recipientEmail)->update([
            'status' => 'sent',
        ]);
    }
}



