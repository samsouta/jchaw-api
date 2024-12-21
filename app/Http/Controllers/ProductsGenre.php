<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsGenre extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        $products = $query->paginate(12);

        // pagination link တွေမှာ query string ထည့်ခြင်း
        $products->appends($request->all());

        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'from' => $products->firstItem(),
                'last_page' => $products->lastPage(),
                'path' => $products->path(),
                'per_page' => $products->perPage(),
                'to' => $products->lastItem(),
                'total' => $products->total(),
            ],
            'links' => [
                'first' => $products->url(1), // genre filter ကို link မှာထား
                'last' => $products->url($products->lastPage()), // genre filter ကို link မှာထား
                'prev' => $products->previousPageUrl(), // genre filter ကို link မှာထား
                'next' => $products->nextPageUrl(), // genre filter ကို link မှာထား
            ],
        ]);
    }
}
