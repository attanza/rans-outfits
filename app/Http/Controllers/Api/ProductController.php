<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page');
        $search = $request->query('search');
        $page = $request->query('page');
        $sort_by = $request->query('sort_by');
        $sort_mode = $request->query('sort_mode');
        if (!isset($sort_by)) $sort_by = 'name';
        if (!isset($sort_mode)) $sort_mode = 'asc';

        $cacheKey = "Product_$page.$per_page.$sort_by.$sort_mode";

        $cache = Cache::get($cacheKey);
        if (isset($cache)) {
            return response()->json($cache, 200);
        }

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
        })
            ->orderBy($sort_by, $sort_mode)
            ->paginate($per_page);
        $parsed = $products->toArray();

        if (!isset($search) || $search == '') {
            Cache::tags('Product')->forever($cacheKey, $products);
        }

        return response()->json($parsed, 200);
    }

    public function store(StoreProduct $request)
    {
        $product = Product::create($request->all());
        Cache::tags('Product')->flush();
        return response()->json($product, 201);
    }

    public function update(Request $request)
    {
        // $product = Product::create($request->all());
        // Cache::tags('Product')->flush();
        $product = $request->all();
        return response()->json($product, 201);
    }
}
