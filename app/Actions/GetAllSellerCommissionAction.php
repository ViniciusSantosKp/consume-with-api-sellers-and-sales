<?php

namespace App\Actions;

use App\Http\Resources\SellerResource;

class GetAllSellerCommissionAction
{
    public function __invoke(SellerResource $seller)
    {
        $seller->sales->sum->commission;

        return $seller->sales->sum->commission;
    }
}