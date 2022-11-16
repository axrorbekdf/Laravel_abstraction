<?php

namespace App\Services\Interface;

use Illuminate\Support\Facades\Validator;

class AbstractService {
	
	protected $model;

	public function index(){

		return $this->model::all();
	}

	public function show($id){
		
		return $this->model::findOrFail($id);
	}

	public function store(array $data){
		
		$fields = $this->getFields();
		$rules = [];
		foreach ($fields as $key => $field) {
			$rules[$field->getName()] = $field->getRules();
		}

		$validator = Validator::make($data, $rules);

		if($validator->fails()){
			dd($validator->errors());
		}

		$data = $validator->validate();

		// $object = new $this->model;
		// foreach ($fields as $key => $field) {
		// 	//$object->{$field->getName()} = $data[$field->getName];
		//	$field->fill($object, $data);
		// }
		// $object->save();

		return $this->model::create($data);
	}

	public function update($id, array $data){
		
		$fields = $this->getFields();
		$rules = [];
		foreach ($fields as $key => $field) {
			$rules[$field->getName()] = $field->getRules();
		}

		$validator = Validator::make($data, $rules);

		if($validator->fails()){
			dd($validator->errors());
		}

		$data = $validator->validate();

		// foreach ($fields as $key => $field) {
		// 	//$item->{$field->getName()} = $data[$field->getName];
		//	$field->fill($item, $data);
		// }
		// $item->save();

		return $this->model::find($id)->update($data);
	}

	public function destroy($id){
		
		return $this->show($id)->delete();
	}

	public function getFields(){
		return [];
	}
}