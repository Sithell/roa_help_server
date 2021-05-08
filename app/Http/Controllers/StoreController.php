<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function index(Request $request) {
        return $this::jsonResponse(["items" => Store::all()]);
    }
}
