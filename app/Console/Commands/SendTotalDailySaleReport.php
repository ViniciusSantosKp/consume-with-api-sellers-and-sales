<?php

namespace App\Console\Commands;

use App\Actions\SendTotalDailySaleReportAction;
use Illuminate\Console\Command;

class SendTotalDailySaleReport extends Command
{
    protected $signature = 'send:send-total-daily-sale-report';
    protected $description = 'Send a total daily sales report email to all sellers.';

    public function handle()
    {
        (new SendTotalDailySaleReportAction)();

        $this->info('Daily total sales report emails sent successfully');
    }
}
