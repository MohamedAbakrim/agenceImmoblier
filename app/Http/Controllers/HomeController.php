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
        $user = User::first();
        $user->password = '0000';
        dd($user->password, $user);
        return view('home', ["properties" => $properties]);
    }
}
