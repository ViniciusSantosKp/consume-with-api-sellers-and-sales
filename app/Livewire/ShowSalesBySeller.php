<?php

namespace App\Livewire;

use App\Actions\GetSalesBySellerIdAction;
use App\Actions\GetSellerByIdAction;
use App\Actions\SaveSaleAction;
use Illuminate\Support\Arr;
use Livewire\Component;

class ShowSalesBySeller extends Component
{
    public $sellerId = '';
    public $value = '';
    public $seller = [];

    protected $rules = [
        'value' => 'required|numeric|min:0.01',
    ];

    public function mount($sellerId):void
    {
        $this->sellerId = $sellerId;
    }

    public function render()
    {
        $sales = (new GetSalesBySellerIdAction)($this->sellerId);
        $this->seller = (new GetSellerByIdAction)($this->sellerId);

        if ($message = Arr::get($this->seller, 'message')) {
            abort(404, $message);
        }

        return view('livewire.show-sales-by-seller', [
            'sales' => Arr::get($sales, 'data'),
        ]);
    }

    public function saveSale():array
    {
        $this->validate();

        $sale = (new SaveSaleAction)($this->value, $this->sellerId);

        $this->value= '';

        return $sale;
    }
}