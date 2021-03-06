<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class ComboDataController extends Controller
{
    public function index(Request $request)
    {
        $allowedModels = ['ProductCategory', 'StockStatus'];
        $model = $request->query('model');
        if (!in_array($model, $allowedModels)) {
            return response()->json(['msg' => 'Model unknown'], 400);
        }

        $cacheKey = "ComboData_$model";

        $cache = Cache::get($cacheKey);
        if (isset($cache)) {
            return response()->json($cache, 200);
        }
        $Model = '\App\Models\\' . $model;
        $data = $Model::all();
        if (!isset($search) || $search == '') {
            Cache::forever($cacheKey, $data->toArray());
        }
        return response()->json($data, 200);

    }
}
