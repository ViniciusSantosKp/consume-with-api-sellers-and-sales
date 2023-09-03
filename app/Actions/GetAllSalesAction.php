<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class GetAllSalesAction
{
    public function __invoke()
    {
        try {
            $response = ApiSellersAndSalesFacade::get('api/sales');

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('GetAllSalesAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return;
        }
    }
}