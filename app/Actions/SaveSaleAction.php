<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class SaveSaleAction
{
    public function __invoke($value, $sellerId)
    {
        $dataToSave = [
            'value' => $value,
            'seller' => $sellerId,
        ];

        try {
            $response = ApiSellersAndSalesFacade::post('api/sales', $dataToSave);

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('SaveSaleAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return;
        }
    }
}