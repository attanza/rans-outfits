<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query();
        $per_page = $request->query('per_page');
        $search = $request->query('search');

        if (!isset($per_page)) {
            $per_page = 10;
        }
        $products = Product::where(function ($query) use ($search) {
            if ($search && $search != '') {
                $query->where('name', 'LIKE', "%$search%");
                $query->orWhere('code', 'LIKE', "%$search%");
                $query->orWhere('regular_price', 'LIKE', "%$search%");
                $query->orWhere('sell_price', 'LIKE', "%$search%");
                $query->orWhere('stock', 'LIKE', "%$search%");

            }
        })->paginate($per_page);

        return response()->json($products, 200);
    }
}
