<?php

namespace App\Actions;

use App\Mail\SendTotalDailySalesReport;
use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;
use Illuminate\Support\Facades\Mail;

class SendTotalDailySaleReportAction
{
    public function __invoke()
    {
        $saleRepository = new SaleRepository();
        $sellerRepository = new SellerRepository();

        $sales = $saleRepository->getAllTodaySales();
        $sellers = $sellerRepository->getAll();

        $dataToSend = [
            'sales_quantity' => count($sales),
            'sales_value' => number_format($sales->sum->value, 2, ',', '.'),
            'date' => now()->format('d/m/Y'),
        ];

        $sellers->each(function ($seller) use ($dataToSend) {
            Mail::to($seller->email)->queue(new SendTotalDailySalesReport($dataToSend));
        });
    }
}