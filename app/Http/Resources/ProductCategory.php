<?php 

namespace App\Http\Resources;

use App\Models\ProductCategory as ModelsProductCategory;
use App\Fields\Store\TextField;
use App\Fields\Store\MoneyField;

class ProductCategory{

	public $model = ModelsProductCategory::class;

	public function getFields(){
		return [
            TextField::make('name')->setRules('required')
        ];
	}

}