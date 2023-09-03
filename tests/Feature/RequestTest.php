<?php

namespace Tests\Feature;

use App\Models\Sale;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class RequestTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_the_create_seller_model(): void
    {
        $factory = Seller::factory()->make()->toArray();
        $response = $this->post('/api/sellers', $factory);

        $response->assertCreated();
        $response->assertJsonIsObject();
        $response->assertJsonStructure(['data' => [
            'id',
            'name',
            'email',
            'commission',
            'commission_formatted',
        ]]);

        $responseData = $response->getData();

        $this->assertEquals($factory['email'], $responseData->data->email);
        $this->assertEquals($factory['name'], $responseData->data->name);
        $this->assertEquals(0, $responseData->data->commission);

        $this->assertDatabaseHas('sellers', ['email' => $factory['email']]);
        $this->assertDatabaseHas('sellers', ['name' => $factory['name']]);
    }

    public function test_the_create_seller_model_with_missed_required_field(): void
    {
        $response = $this->post('/api/sellers', [
            'name' => 'Just name without email',
        ]);

        $response->assertInvalid();

        $response = $this->post('/api/sellers', [
            'email' => 'abc@email.com',
        ]);

        $response->assertInvalid();
    }

    public function test_the_create_sale_model()
    {
        $factory = Sale::factory()->make()->toArray();

        $response = $this->post('/api/sales', [
            'value' => $factory['value'],
            'seller' => 1,
        ]);

        $response->assertCreated();
        $response->assertJsonIsObject();
        $response->assertJsonStructure(['data' => [
            'id',
            'name',
            'email',
            'commission',
            'commission_formatted',
            'value',
            'value_formatted',
            'sale_date',
        ]]);

        $responseData = $response->getData();

        $this->assertEquals($factory['value'], $responseData->data->value);
        $this->assertEquals(round($factory['commission'], 2), $responseData->data->commission);

        $this->assertDatabaseHas('sales', ['value' => $factory['value']]);
        $this->assertDatabaseHas('sales', ['commission' => $factory['commission']]);
    }

    public function test_the_create_sale_model_with_missed_required_field(): void
    {
        //Teste faltando parâmetro
        $response = $this->post('/api/sales', [
            'value' => 80,
        ]);

        $response->assertInvalid();

        //Teste com id não existente
        $response = $this->post('/api/sales', [
            'seller' => 800,
        ]);

        $response->assertInvalid();
    }
}
