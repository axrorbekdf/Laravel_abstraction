<?php 

namespace App\Http\Resources;

use App\Models\Product as ModelsProduct;
use App\Fields\Store\TextField;
use App\Fields\Store\MoneyField;

class Product{

	public $model = ModelsProduct::class;

	public function getFields(){
		return [
            TextField::make('name')->setRules('required'),
            MoneyField::make('price')->setRules('required|numeric'),
        ];
	}

}