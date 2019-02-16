<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query();
        $per_page = $request->query('per_page');
        if (!isset($per_page)) {
            $per_page = 10;
        }
        $products = Product::paginate($per_page);

        return response()->json($products, 200);
    }
}
