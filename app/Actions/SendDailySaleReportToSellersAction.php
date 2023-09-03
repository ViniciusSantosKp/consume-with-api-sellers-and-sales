<?php

namespace App\Actions;

use App\Mail\SendDailySalesReport;
use App\Repositories\SellerRepository;
use Illuminate\Support\Facades\Mail;

class SendDailySaleReportToSellersAction
{
    public function __invoke():void
    {
        $sellerRepository = new SellerRepository();

        $sellers = $sellerRepository->getSellersWithTodaySales();

        $sellers->each(function ($seller) {

            $dataToSend = [
                'id' => $seller->id,
                'name' => $seller->name,
                'email' => $seller->email,
                'sales_quantity' => count($seller->sales),
                'sales_total' => number_format($seller?->sales?->sum->value, 2, ',', '.'),
                'commission' => number_format($seller?->sales?->sum->commission, 2, ',', '.'),
                'date' => now()->format('d/m/Y'),
            ];

            Mail::to($seller->email)->queue(new SendDailySalesReport($dataToSend));
        });
    }
}