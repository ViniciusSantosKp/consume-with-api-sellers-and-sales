<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class GetSellerByIdAction
{
    public function __invoke($seller_id)
    {
        try {
            $response = ApiSellersAndSalesFacade::get("api/seller/$seller_id");

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('GetSellerByIdAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return;
        }
    }
}