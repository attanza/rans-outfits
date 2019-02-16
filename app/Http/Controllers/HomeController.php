<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(["medias" => function ($query) {
            $query->where("is_publish", 1)
                ->where("is_main", 1)
                ->limit(1);
        }])
            ->where("is_publish", 1)
            ->where("is_featured", 1)
            ->where("stock_status_id", 1)
            ->limit(12)
            ->get();
        return view('home')->with('products', $products);
    }
}
