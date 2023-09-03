<?php

namespace App\Repositories;

use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Carbon\Carbon;

class SellerRepository
{
    public function store(array $data)
    {
        $seller = Seller::create($data);

        return new SellerResource($seller);
    }

    public function getAll()
    {
        return SellerResource::collection(Seller::with('sales')->get());
    }

    public function getSellersWithTodaySales()
    {
        $sellers = Seller::query()
            ->with(['sales' => function ($query) {
                $query->whereDate('created_at', Carbon::today());
            }])
            ->get();

        return SellerResource::collection($sellers);
    }

    public function getSellerById(Seller $seller)
    {
        return new SellerResource($seller);
    }

    public function update(Seller $seller, array $data)
    {
        $seller->update($data);

        return new SellerResource($seller);
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
    }
}
