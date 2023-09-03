<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellerRequest;
use App\Models\Seller;
use App\Repositories\SellerRepository;

class SellerController extends Controller
{
    public function __construct(protected SellerRepository $sellerRepository)
    {
    }

    public function store(StoreSellerRequest $request)
    {
        try {
            $data = $request->validated();

            return $this->sellerRepository->store($data);

        } catch (\Exception $e) {
            logger()->error('SellerController@store - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'payload' => $request->all(),
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while saving the seller.'], $error);
        }
    }

    public function show()
    {
        try {
            return $this->sellerRepository->getAll();

        } catch (\Exception $e) {
            logger()->error('SellerController@show - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while retrieving sellers.'], $error);
        }
    }

    public function showById(Seller $seller_id)
    {
        try {
            return $this->sellerRepository->getSellerById($seller_id);

        } catch (\Exception $e) {
            logger()->error('SellerController@showById - error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'payload' => $seller_id,
            ]);

            $error = 500;
            return response()->json(['error' => 'An error occurred while retrieving seller.'], $error);
        }
    }
}
