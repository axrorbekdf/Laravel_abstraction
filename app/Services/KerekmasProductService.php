<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Interface\AbstractService;
use App\Fields\Store\TextField;

class ProductService extends AbstractService{

	protected $model = Product::class;

	public function getFields(){
		return [
			TextField::make('name')->setRules('required'),
			TextField::make('price')->setRules('required|numeric'),
		];
	}
}