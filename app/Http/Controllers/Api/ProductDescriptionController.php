<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductDescription;
use App\Http\Requests\StoreProductDescription;
use Illuminate\Support\Facades\Cache;

class ProductDescriptionController extends Controller
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

        $cacheKey = "ProductDescription_$page.$per_page.$sort_by.$sort_mode";

        $cache = Cache::get($cacheKey);
        if (isset($cache)) {
            return response()->json($cache, 200);
        }

        if (!isset($per_page)) {
            $per_page = 10;
        }
        $descripton = ProductDescription::where(function ($query) use ($search) {
            if ($search && $search != '') {
                $query->where('short_description', 'LIKE', "%$search%");
                $query->orWhere('short_description', 'LIKE', "%$search%");
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

    public function store(StoreProductDescription $request)
    {
        $product = ProductDescription::create($request->all());
        Cache::tags('Product')->flush();
        return response()->json($product, 201);
    }

    public function update(StoreProductDescription $request, $id)
    {
        $data = ProductDescription::find($id);
        if (!$data) {
            return response()->json([
                'msg' => 'Product not found'
            ], 400);
        }
        $data->update($request->all());
        Cache::tags('Product')->flush();
        return response()->json($data, 200);
    }
}
