<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiSellersAndSalesProvider extends ServiceProvider
{
    // Creating a service provider to facilitate the api call
    public function register()
    {
        $this->app->bind('api-sellers-and-sales', function() {
            return Http::withOptions([
                'verify' => false,
                'base_uri' => 'http://localhost:7878',
            ])
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
              ]);
        });
    }
}