<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_resourcce_service_fields(){

        $fields = [
            'name' => 'field'
        ];
        
        $model = \App\Models\Product::class;

        $resource = new \App\Services\ResourceService($model, $fields);
        $got_fields = $resource->getFields();

        $this->assertEquals($fields, $got_fields);

    }
}
