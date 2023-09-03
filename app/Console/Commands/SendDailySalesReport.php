<?php

namespace App\Console\Commands;

use App\Actions\SendDailySaleReportToSellersAction;
use App\Repositories\SellerRepository;
use Illuminate\Console\Command;

class SendDailySalesReport extends Command
{
    protected $signature = 'send:send-daily-sales-report';
    protected $description = 'Send a daily sales report by sellers email to all sellers.';

    public function __construct(private SellerRepository $sellerRepository)
    {
        parent::__construct();
    }
    public function handle()
    {
        (new SendDailySaleReportToSellersAction)();

        $this->info('Daily sales report emails sent successfully');
    }
}
