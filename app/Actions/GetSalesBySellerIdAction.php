<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class GetSalesBySellerIdAction
{
    public function __invoke(int $sellerId):array
    {
        try {
            $response = ApiSellersAndSalesFacade::get("api/sales/$sellerId");

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('GetSalesBySellerIdAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return [];
        }
    }
}