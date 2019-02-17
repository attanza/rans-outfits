<?php

namespace App\Http\Controllers\Api;

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
        $Model = '\App\Models\\' . $model;
        $data = $Model::all();
        return response()->json($data, 200);

    }
}
