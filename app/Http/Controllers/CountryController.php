<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
//    public function index(){
//
//    }

    public function getCountry(){
        $countries = Country::all();

        return response()->json($countries,200);
    }
}
