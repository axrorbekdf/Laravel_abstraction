<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_response()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_count_response()
    {
        $response = $this->get('/api/products');
        $count = count($response->getData()->items);
        $this->assertDatabaseCount('products', $count);
    }

    // show
    
    public function test_show_product_for_response()
    {   
        $product = \App\Models\Product::first();

        $response = $this->get('/api/products/'.$product->id);
        
        $response->assertStatus(200);

        $response->assertJsonStructure([
            "item" => [
                "id",
                "name",
                "price",
                "created_at",
                "updated_at",
            ]
        ]);
    }
    
    // store

    public function test_create_product_for_response()
    {   
        $product_data = [
            'name' => 'Test product',
            'price' => 1000
        ];

        $response = $this->post('/api/products', $product_data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('products', $product_data);

        $response->assertJsonStructure([
            "item" => [
                "name",
                "price",
                "updated_at",
                "created_at",
                "id",
            ]
        ]);
    }
    
    // update

    public function test_update_product_for_response()
    {   
        $product = \App\Models\Product::first();

        $product_data = [
            '_method' => 'PUT',
            'name' => 'Test product new',
            'price' => 56000
        ];
        $response = $this->post('/api/products/'.$product->id, $product_data);
        
        $response->assertStatus(200);

        $product_data = [
            'name' => 'Test product new',
            'price' => 56000
        ];

        $this->assertDatabaseHas('products', $product_data);

        $response->assertJsonStructure([
            "item",
        ]);
    }

    // delete

    public function test_delete_product_for_response()
    {   
        $product = \App\Models\Product::first();

        $product_data = [
            '_method' => 'DELETE',
        ];
        $response = $this->post('/api/products/'.$product->id, $product_data);
        
        $response->assertStatus(200);

        $response->assertJsonStructure([
            "item",
        ]);
    }
}
