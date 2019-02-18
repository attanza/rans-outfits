<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function show(Request $request, $id)
    {
        $activeTab = $request->query('activeTab');
        if (!isset($activeTab)) $activeTab = 'detail';
        $product = Product::with('description')->find($id);
        return view('products.show')->with([
            'product' => $product,
            'activeTab' => $activeTab
        ]);
    }
}
