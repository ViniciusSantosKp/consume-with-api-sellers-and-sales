<?php

namespace App\Actions;

use App\Models\Sale;

class CalculateSellerCommissionAction
{
    public function __invoke(float $value):float
    {
        $commission = $value * Sale::DEFAULT_COMMISSION;

        return round($commission, 2);
    }
}