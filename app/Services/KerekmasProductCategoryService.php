<?php

namespace App\Services;

use App\Models\ProductCategory;
use App\Services\Interface\AbstractService;
use App\Fields\Store\TextField;

class ProductCategoryService extends AbstractService{

	protected $model = ProductCategory::class;

	public function getFields(){
		return [
			TextField::make('name')->setRules('required'),
		];
	}
}

?>