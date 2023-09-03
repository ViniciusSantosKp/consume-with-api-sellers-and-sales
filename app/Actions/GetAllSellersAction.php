<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class GetAllSellersAction
{
    public function __invoke()
    {
        try {
            $response = ApiSellersAndSalesFacade::get('api/sellers');

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('GetAllSellersAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return;
        }
    }
}