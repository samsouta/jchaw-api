<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Product::select('category') 
            ->distinct()  
            ->get() 
            ->pluck('category');  

        return response()->json([
            'genres' => $genres
        ]);
    }
}
