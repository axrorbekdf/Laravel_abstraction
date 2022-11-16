<?php

namespace App\Http\Controllers;

use App\Services\ResourceService;
use Illuminate\Support\Str;

class ResourceController extends AbstractController
{   
    public function __construct(){

        $resourceName = request()->route()->parameters['resource'];
        $resourceName = Str::singular($resourceName); 
        $resourceName = Str::studly($resourceName); 

        $resource = new ("App\\Http\\Resources\\$resourceName");

        $this->service = new ResourceService(
            $resource->model,
            $resource->getFields()
        );
    }
}