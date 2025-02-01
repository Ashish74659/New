<?php

namespace App\Console\Commands;

use App\Helpers\EmailHelper;
use App\Models\AlertLogModel;
use App\Models\Company_employee;
use App\Models\NoticeCommunication;
use App\Models\TenderMembers;
use App\Models\TenderSend; 
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotificationCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NotificationCronJob:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends notifications for Tender, Auction, and EOI communications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now('Asia/Muscat')->format('Y-m-d');

        // Fetch communications to be sent today
        $communications = NoticeCommunication::where('status', 'Published')
                                             ->where('date', $now)
                                             ->get();

        foreach ($communications as $comdata) {
            if ($comdata) {
                switch ($comdata->type) {
                    case 'Tender':
                        $this->handleTenderCommunication($comdata);
                        break;
                    case 'Auction':
                        $this->handleAuctionCommunication($comdata);
                        break;
                    case 'EOI':
                        $this->handleEOICommunication($comdata);
                        break;
                    default:
                        // Handle other cases if necessary
                        break;
                }

                // Mark communication as 'Sent'
                $comdata->status = 'Sent';
                $comdata->save();
            }
        }
    }

    /**
     * Handle communication related to Tender.
     *
     * @param NoticeCommunication $comdata
     */
    private function handleTenderCommunication($comdata)
    {
        
            // Handle Employee communication for Tender
            $tenderMembers = TenderMembers::where('tender_id', $comdata->tender_id)
                                          ->where('sent_to', 'Yes')
                                          ->distinct()
                                          ->pluck('emp_id');

            foreach ($tenderMembers as $tenderMem) {
                $employee = Company_employee::find($tenderMem);

                if ($employee) {
                    $log = new AlertLogModel();
                    $log->tender_id = $comdata->tender_id;
                    $log->type = $comdata->type;
                    $log->emp_id = $employee->id;
                    $log->email_id = $employee->email;
                    $log->communication_id = $comdata->id;

                    if ($employee->email) {
                        $log->status = 'Sent';
                        EmailHelper::mail_send($employee->email, $comdata->subject_body, $comdata->mail_body);
                    } else {
                        $log->status = 'Failed';
                    }

                    $log->save();
                }
            }
        
    }

    /**
     * Handle Auction communication.
     *
     * @param NoticeCommunication $comdata
     */
    private function handleAuctionCommunication($comdata)
    {
        // Handle Auction case
        // You can add the logic for Auction communication here
    }

    /**
     * Handle EOI communication.
     *
     * @param NoticeCommunication $comdata
     */
    private function handleEOICommunication($comdata)
    {
        // Handle EOI case
        // You can add the logic for EOI communication here
    }
}
