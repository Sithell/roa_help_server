<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    function show(Request $request, string $name) {
        return $this::jsonResponse(["items" => Food::where('name', 'LIKE', '%'.$name.'%')->get()]);
    }
}
