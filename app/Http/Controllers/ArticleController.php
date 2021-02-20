<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index(Request $request) {
        return $this::jsonResponse(Article::all());
    }
}
