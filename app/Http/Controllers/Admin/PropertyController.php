<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Option;
use App\Http\Requests\Admin\PropertyFormRequest;



class PropertyController extends Controller
{

    public function index()
    {
        return view('admin.properties.index', [
            "properties" => Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        
        $property = new Property();
        $property->fill([
            "surface" => 40,
            "rooms" => 3,
            "bedrooms" => 1,
            "floor" => 0,
            "city" => "Agadir",
            "postal_code" => 85000,
            "sold" => false
        ]);
        return view('admin.properties.form', [
            "property" => $property,
            "options" => Option::pluck('name', 'id')
        ]);

    }

    
    public function store(PropertyFormRequest $request)
    {

        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été créé');

    }

    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            "property" => $property,
            "options" => Option::pluck('name', 'id')
        ]);
    }

    
    public function update(PropertyFormRequest $request, Property $property)
    {

        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été modifié');

    }

    
    public function destroy(Property $property)
    {
        //
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé');

    }
}
