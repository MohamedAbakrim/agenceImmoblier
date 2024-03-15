<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        $properties = Property::latest()->available()->limit(4)->get();
        return view('home', ["properties" => $properties]);
    }
}
