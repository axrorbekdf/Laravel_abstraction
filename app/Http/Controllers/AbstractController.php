<?php

namespace App\Http\Controllers;


class AbstractController extends Controller {

    protected $service;
	protected $serviceClass;

    public function __construct(){
        $this->service = new $this->serviceClass;
    }

	public function index()
    {   
        $items = $this->service->index();
        return response()->json(['items' => $items]); 
    }

    public function store()
    {   
        $item = $this->service->store(request()->all());
        return response()->json(['item' => $item]);
    }

    
    public function show($id)
    {   
        $item = $this->service->show(request()->id);
        return response()->json(['item' => $item]);
    }

    
    public function update($id)
    {
        $item = $this->service->update(request()->id, request()->all());
        return response()->json(['item' => $item]);
    }

    
    public function destroy($id)
    {
        $item = $this->service->destroy(request()->id);
        return response()->json(['item' => $item]);
    }
}