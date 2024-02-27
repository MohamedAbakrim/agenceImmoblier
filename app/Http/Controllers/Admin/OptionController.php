<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Requests\Admin\OptionFormRequest;



class OptionController extends Controller
{

    public function index()
    {
        return view('admin.options.index', [
            "options" => Option::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        
        $option = new Option();
        $option->fill([
            "surface" => 40,
            "rooms" => 3,
            "bedrooms" => 1,
            "floor" => 0,
            "city" => "Agadir",
            "postal_code" => 85000,
            "sold" => false
        ]);
        return view('admin.options.form', [
            "option" => $option
        ]);

    }

    
    public function store(OptionFormRequest $request)
    {

        $option = option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été créé');

    }

    public function edit(Option $option)
    {
        return view('admin.options.form', ["option" => $option]);
    }

    
    public function update(OptionFormRequest $request, Option $option)
    {

        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a bien été modifié');

    }

    
    public function destroy(Option $option)
    {
        //
        $option->delete();
        return to_route('admin.option.index')->with('success', 'L\'option a bien été supprimé');

    }
}
