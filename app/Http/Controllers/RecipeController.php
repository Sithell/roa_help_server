<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function index(Request $request) {
        return $this::jsonResponse(["items" => Recipe::all()]);
    }
}
