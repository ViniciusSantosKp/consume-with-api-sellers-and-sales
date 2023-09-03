<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiSellersAndSalesFacade extends Facade
{
	// Creating a Facade to facilitate the api call
    protected static function getFacadeAccessor()
 	{
 		return 'api-sellers-and-sales';
 	}
}