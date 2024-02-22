<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;



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
        
        return view('admin.properties.form', [
            "property" => new Property()
        ]);
    }

    
    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
