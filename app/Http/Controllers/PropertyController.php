<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    
    public function index(SearchPropertiesRequest $request){

        $query = Property::query();
        if($price = $request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        return view('property.index', [
            "properties" => $query->paginate(16),
            "input" => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property){

    }

}
