<?php

namespace App\Actions;

use App\Facades\ApiSellersAndSalesFacade;

class SaveSellerAction
{
    public function __invoke($name, $email)
    {
        $dataToSave = [
            'name' => $name,
            'email' => $email,
        ];

        try {
            $response = ApiSellersAndSalesFacade::post('api/sellers', $dataToSave);

            return $response->json();

        } catch (\Exception $e) {
            logger()->error('SaveSellerAction - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return;
        }
    }
}