<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
// use App\Services\ProductCategoryService;
use App\Services\ResourceService;
use App\Fields\Store\TextField;

class ProductCategoryController extends AbstractController
{
    // protected $serviceClass = ProductCategoryService::class;

    public function __construct(){
        $this->service = new ResourceService(
            ProductCategory::class,
            [
                TextField::make('name')->setRules('required'),
            ]
        );
    }
}