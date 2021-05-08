<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    function index(Request $request) {
        return $this::jsonResponse(["items" => City::pluck('name')]);
    }
}
