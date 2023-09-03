<?php

namespace App\Http\Resources;

use App\Actions\GetAllSellerCommissionAction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'commission' => $this->sales->sum->commission,
            'commission_formatted' => number_format($this->sales->sum->commission, 2, ',', '.'),
        ];
    }
}
