<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Seller;
use App\Repositories\SaleRepository;

class SaleController extends Controller
{
    public function __construct(protected SaleRepository $saleRepository)
    {
    }

    public function store(StoreSaleRequest $request)
    {
        try {
            $data = $request->validated();

            return $this->saleRepository->store($data);

        } catch (\Exception $e) {
            logger()->error('SaleController@store - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'payload' => $request->all(),
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while saving the sale.'], $error);
        }
    }

    public function showSalesBySellerId(Seller $seller_id)
    {
        try {

            return $this->saleRepository->getAllBySellerId($seller_id);

        } catch (\Exception $e) {
            logger()->error('SaleController@showSalesBySellerId - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'payload' => $seller_id,
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while retrieving the sales.'], $error);
        }
    }

    public function show()
    {
        try {

            return $this->saleRepository->getAll();

        } catch (\Exception $e) {
            logger()->error('SaleController@show - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while retrieving the sales.'], $error);
        }
    }
}
