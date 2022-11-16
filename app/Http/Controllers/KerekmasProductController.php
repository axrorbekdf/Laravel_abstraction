<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use App\Services\ProductService;
use App\Services\ResourceService;
use App\Fields\Store\TextField;
use App\Fields\Store\MoneyField;

class ProductController extends AbstractController
{   
    // protected $serviceClass = ProductService::class;

    public function __construct(){
        $this->service = new ResourceService(
            Product::class,
            [
                TextField::make('name')->setRules('required'),
                MoneyField::make('price')->setRules('required|numeric'),
            ]
        );
    }
}