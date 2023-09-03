<?php

namespace App\Livewire;

use App\Actions\GetAllSalesAction;
use Illuminate\Support\Arr;
use Livewire\Component;

class ShowAllSales extends Component
{
    public function render()
    {
        $sales = (new GetAllSalesAction)();

        $salesTotal = Arr::get($sales, 'data')
            ? number_format((collect(Arr::get($sales, 'data')))->sum->value, 2, ',', '.')
            : '0,00';

        return view('livewire.show-all-sales', [
            'sales' => Arr::get($sales, 'data'),
            'sales_total' => $salesTotal,
        ]);
    }
}