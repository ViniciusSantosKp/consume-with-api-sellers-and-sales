<?php

namespace App\Livewire;

use App\Actions\GetAllSellersAction;
use App\Actions\SaveSellerAction;
use App\Facades\ApiSellersAndSalesFacade;
use Illuminate\Support\Arr;
use Livewire\Component;

class ShowSellerForm extends Component
{
    public $newSeller = [
        'name' => '',
        'email' => '',
    ];

    public $newSale = [
        'value' => '',
        'seller_id' => '',
    ];

    protected $rules = [
        'newSeller.name' => 'required|string|min:3|max:255',
        'newSeller.email' => [
            'required',
            'email',
            'max:255',
        ]
    ];

    public function render()
    {
        $sellers = (new GetAllSellersAction)();

        return view('livewire.show-seller-form', [
            'sellers' => Arr::get($sellers, 'data'),
        ]);
    }

    public function saveSeller():array
    {
        $this->validate();

        $seller = (new SaveSellerAction)(Arr::get($this->newSeller, 'name'), Arr::get($this->newSeller, 'email'));

        $this->newSeller['name'] = '';
        $this->newSeller['email'] = '';

        return $seller;
    }

    public function getAllSellers():array
    {
        $response = ApiSellersAndSalesFacade::get('api/sellers');

        if ($response->failed()) {
            abort(404, 'Error while retrieving sellers from api Sellers and sales');
        }

        return $response->json();
    }
}